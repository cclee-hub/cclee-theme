#!/usr/bin/env python3
"""FSE theme mechanical audit script.
Scans patterns/templates/parts for programmable convention violations.
Usage: python3 audit.py <theme_dir>
"""

import json
import os
import re
import sys

THEME_DIR = sys.argv[1] if len(sys.argv) > 1 else "."
TARGETS = ["patterns", "templates", "parts"]
VIOLATIONS = 0


def report(filepath, linenum, msg):
    global VIOLATIONS
    VIOLATIONS += 1
    print(f"\033[0;31m[FAIL]\033[0m {filepath}:{linenum} {msg}")


def extract_block_json(line):
    """Extract JSON object from a block comment using brace matching."""
    m = re.search(r'<!--\s+wp:\S+\s+(\{)', line)
    if not m:
        return None
    start = m.start(1)
    depth = 0
    for pos in range(start, len(line)):
        if line[pos] == '{':
            depth += 1
        elif line[pos] == '}':
            depth -= 1
            if depth == 0:
                return line[start:pos + 1]
    return None


def check_var_parens(filepath, lines):
    """Check 1: unmatched var( in style attributes.
    Only counts closing parens that belong to var(), not calc() etc.
    Strategy: extract var(...) groups and count their closing parens.
    """
    for i, line in enumerate(lines, 1):
        if 'style="' not in line:
            continue
        m = re.search(r'style="([^"]*)"', line)
        if not m:
            continue
        style_val = m.group(1)
        opens = style_val.count("var(")
        # Count closing parens that terminate var() — each var( needs exactly one )
        # We count all ) and subtract those used by other functions (calc, etc.)
        other_funcs = len(re.findall(r'\b(?!var)\w+\(', style_val))
        closes = style_val.count(")") - other_funcs
        if opens != closes:
            report(filepath, i, f"var() mismatch (open={opens} close={closes})")


def check_json_single_quotes(filepath, lines):
    """Check 2: single quotes in JSON block attributes."""
    for i, line in enumerate(lines, 1):
        if "<!-- wp:" not in line:
            continue
        if re.search(r"'[a-zA-Z]+'\s*:", line):
            report(filepath, i, "single quotes in JSON")


def check_span_in_paragraph(filepath, lines):
    """Check 3: <span> inside wp:paragraph.
    Checks span BEFORE entering paragraph to avoid false positives when
    another block's HTML (e.g. cover background span) appears on the
    same line as <!-- wp:paragraph -->.
    """
    in_para = False
    for i, line in enumerate(lines, 1):
        # Check for span BEFORE processing paragraph start on same line
        if in_para and "<span" in line:
            report(filepath, i, "<span> inside wp:paragraph")
        if "<!-- wp:paragraph" in line:
            in_para = True
        if "<!-- /wp:paragraph" in line:
            in_para = False


def check_self_closing_space(filepath, lines):
    """Check 4: self-closing block missing space before /-->."""
    for i, line in enumerate(lines, 1):
        if re.search(r'<!--\s+wp:\S+.*?[^ ]/-->', line):
            report(filepath, i, "self-closing block missing space before /-->")


def check_comment_header(filepath, lines, is_pattern):
    """Check 5: missing comment header (patterns only)."""
    if not is_pattern:
        return
    has_title = has_slug = has_categories = False
    for line in lines[:15]:
        low = line.lower()
        if "title:" in low:
            has_title = True
        if "slug:" in low:
            has_slug = True
        if "categories:" in low:
            has_categories = True
    missing = []
    if not has_title:
        missing.append("Title")
    if not has_slug:
        missing.append("Slug")
    if not has_categories:
        missing.append("Categories")
    if missing:
        report(filepath, 0, f"missing header: {', '.join(missing)}")


def check_json_html_sync(filepath, lines):
    """Check 6: HTML has style attribute but JSON comment has no style declaration.
    Excludes Gutenberg auto-mapped attributes (e.g. width -> flex-basis,
    fontSize -> font-size CSS variable).
    Stops scanning HTML at the next block comment boundary to avoid
    picking up style from a sibling block.
    """
    AUTO_STYLE_ATTRS = {"width", "height", "fontSize"}
    for i, line in enumerate(lines, 1):
        m = re.search(r'<!--\s+wp:\S+\s+(.*?)\s*-->', line)
        if not m:
            continue
        json_str = m.group(1)
        if not json_str or json_str.startswith("/"):
            continue
        html_lines = []
        for j in range(i, min(i + 3, len(lines) + 1)):
            next_line = lines[j - 1]
            # Stop at next block comment to avoid scanning sibling blocks
            if j > i and '<!-- wp:' in next_line:
                break
            html_lines.append(next_line)
        html_text = "".join(html_lines)
        if 'style="' not in html_text:
            continue
        if '"style"' in json_str:
            continue
        has_auto = any(f'"{attr}"' in json_str for attr in AUTO_STYLE_ATTRS)
        if not has_auto:
            report(filepath, i, "HTML has style but JSON missing style declaration")


def check_color_class_completeness(filepath, lines):
    """Check 7: color class sequence completeness.
    - has-{x}-background-color must be accompanied by has-background
    - has-{x}-color must be accompanied by has-text-color
    Skips server-side rendered dynamic blocks (HTML output is block-controlled).
    """
    # Server-side rendered blocks: their HTML output is generated by PHP,
    # so checking their rendered class list for completeness is meaningless.
    DYNAMIC_BLOCKS = frozenset([
        "post-excerpt", "post-author-name", "post-date", "post-terms",
        "post-title", "post-featured-image", "post-content",
        "woocommerce/product-results-count", "woocommerce/product-price",
        "woocommerce/product-categories", "woocommerce/product-button",
        "woocommerce/price-filter", "woocommerce/active-filters",
        "woocommerce/attribute-filter", "woocommerce/stock-filter",
        "woocommerce/order-confirmation-order-number",
        "core/comments", "core/query-pagination",
    ])
    in_dynamic = False
    for i, line in enumerate(lines, 1):
        # Track dynamic block boundaries
        if "<!-- wp:" in line:
            block_m = re.search(r'wp:(\S+)', line)
            if block_m and block_m.group(1).rstrip("/").rstrip().rstrip(",") in DYNAMIC_BLOCKS:
                in_dynamic = True
            elif "/-->" in line and in_dynamic:
                in_dynamic = False
            continue
        if "<!-- /wp:" in line:
            in_dynamic = False
            continue
        if in_dynamic:
            continue
        # Skip block comment lines
        if line.strip().startswith("<!--"):
            continue
        # Check background color class
        if re.search(r'has-[\w]+-background-color', line):
            if 'has-background' not in line:
                report(filepath, i, "has-{color}-background-color missing has-background")
        # Check text color class (exclude border-color and icon-color)
        if re.search(r'has-[\w]+-color', line) and 'background' not in line and 'border' not in line and 'icon' not in line:
            if 'has-text-color' not in line:
                report(filepath, i, "has-{color}-color missing has-text-color")


def check_gradient_slug_suffix(filepath, lines):
    """Check 8: gradient slug must not contain -gradient suffix."""
    for i, line in enumerate(lines, 1):
        if "<!-- wp:" not in line:
            continue
        if re.search(r'"gradient"\s*:\s*"[^"]*-gradient"', line):
            report(filepath, i, "gradient slug must not contain -gradient suffix")


def check_table_structure(filepath, lines):
    """Check 9: <table> must not have padding style; must have has-fixed-layout class.
    <figure> must not have border-style/border-width/border-radius (Gutenberg save
    only outputs padding to <figure>, border goes to <table>)."""
    in_table_block = False
    for i, line in enumerate(lines, 1):
        if "<!-- wp:table" in line:
            in_table_block = True
        if in_table_block and "<figure" in line:
            if re.search(r'style="[^"]*border-(?:style|width|radius)', line):
                report(filepath, i,
                       "<figure> must not have border-style/width/radius "
                       "(Gutenberg save only puts padding on <figure>, border on <table>)")
        if in_table_block and "<table" in line:
            if re.search(r'padding', line):
                report(filepath, i, "<table> must not have padding (put on <figure> instead)")
            if 'has-fixed-layout' not in line:
                report(filepath, i, "<table> missing has-fixed-layout class")
        if "<!-- /wp:table" in line:
            in_table_block = False


def check_json_style_html_missing(filepath, lines):
    """Check 12: core/group JSON has style declaration but HTML missing style attribute.
    Only checks core/group blocks because they always render style.border/style.spacing
    as inline CSS. Other blocks (navigation, columns, social-links) use blockGap or
    CSS classes which don't produce inline styles, causing false positives.
    """
    # Style keys that core/group renders as inline CSS
    GROUP_INLINE_KEYS = [
        "border", "spacing",
    ]
    for i, line in enumerate(lines, 1):
        m = re.search(r'<!--\s+wp:group\s+(.*?)\s*-->', line)
        if not m:
            continue
        json_str = m.group(1)
        if not json_str:
            continue
        if '"style"' not in json_str:
            continue
        # Check if JSON has style sub-keys that produce inline output
        after_style = json_str.split('"style"', 1)[-1]
        has_inline = False
        for key in GROUP_INLINE_KEYS:
            if re.search(rf'"{key}"\s*:', after_style):
                has_inline = True
                break
        if not has_inline:
            continue
        # Skip if only has blockGap (applied to children, not inline on element)
        if 'blockGap' in after_style:
            # Check if there are other non-blockGap style properties
            stripped = re.sub(r'"blockGap"[^}]*\}', '', after_style)
            still_has_inline = False
            for key in GROUP_INLINE_KEYS:
                # Must have a non-empty value, not just "spacing":{}
                if re.search(rf'"{key}"\s*:\s*\{{[^}}]+\w', stripped):
                    still_has_inline = True
                    break
            if not still_has_inline:
                continue
        # Read following HTML lines (up to 5) to find the element
        html_lines = []
        for j in range(i + 1, min(i + 6, len(lines) + 1)):
            html_lines.append(lines[j - 1])
        html_text = "".join(html_lines)
        if 'style="' not in html_text:
            report(filepath, i,
                   "core/group JSON has style declaration but HTML missing style attribute")


def check_json_attr_nesting(filepath, lines, is_pattern):
    """Check 10: top-level attributes must not be nested inside style{}.
    Checks: borderColor, backgroundColor, textColor, className, layout.
    fontSize inside style.typography is allowed for templates/parts (avoids
    Gutenberg class mismatch) but forbidden for patterns.
    """
    TOP_LEVEL_ATTRS = ["borderColor", "backgroundColor", "textColor", "className", "layout"]
    for i, line in enumerate(lines, 1):
        if "<!-- wp:" not in line:
            continue
        json_str = extract_block_json(line)
        if not json_str:
            continue
        try:
            j = json.loads(json_str)
        except json.JSONDecodeError:
            continue
        style = j.get('style')
        if not isinstance(style, dict):
            continue
        for attr in TOP_LEVEL_ATTRS:
            if attr in style:
                report(filepath, i, f'"{attr}" must be top-level JSON attribute, not nested inside style{{}}')
        # fontSize inside style.typography: only flag for patterns
        if is_pattern:
            typo = style.get('typography')
            if isinstance(typo, dict) and 'fontSize' in typo:
                report(filepath, i, '"fontSize" must be top-level JSON attribute, not nested inside style.typography{}')


def check_separator_alpha_class(filepath, lines):
    """Check 11: separator with color must have has-alpha-channel-opacity."""
    in_separator = False
    for i, line in enumerate(lines, 1):
        if "<!-- wp:separator" in line:
            in_separator = True
        if in_separator and "<hr" in line:
            has_color = re.search(r'has-[\w]+-color|has-[\w]+-background-color', line)
            if has_color and 'has-alpha-channel-opacity' not in line:
                report(filepath, i, "separator with color missing has-alpha-channel-opacity")
        if "<!-- /wp:separator" in line:
            in_separator = False


def check_style_nesting(filepath, lines):
    """Check 13: style.border must be direct child of style, not nested in spacing/typography.
    When border is nested inside spacing, Gutenberg ignores it and the save function
    produces no border inline styles, causing Block validation failed.
    """
    for i, line in enumerate(lines, 1):
        if "<!-- wp:" not in line:
            continue
        json_str = extract_block_json(line)
        if not json_str:
            continue
        try:
            j = json.loads(json_str)
        except json.JSONDecodeError:
            continue
        style = j.get('style', {})
        for container in ('spacing', 'typography'):
            container_obj = style.get(container)
            if isinstance(container_obj, dict) and 'border' in container_obj:
                report(filepath, i,
                       f'"border" nested inside style.{container}, must be sibling')


def check_duplicate_style_keys(filepath, lines):
    """Check 14: duplicate top-level keys in style object.
    When a key like 'spacing' appears twice, the second overwrites the first,
    silently dropping properties from the first occurrence.
    """
    for i, line in enumerate(lines, 1):
        if "<!-- wp:" not in line:
            continue
        json_str = extract_block_json(line)
        if not json_str:
            continue
        style_m = re.search(r'"style"\s*:\s*\{', json_str)
        if not style_m:
            continue
        start = style_m.end()
        depth = 1
        end = -1
        for pos in range(start, len(json_str)):
            if json_str[pos] == '{':
                depth += 1
            elif json_str[pos] == '}':
                depth -= 1
                if depth == 0:
                    end = pos
                    break
        if end < 0:
            continue
        style_inner = json_str[start:end]
        # Find top-level keys (depth 0 relative to style{})
        top_keys = []
        for km in re.finditer(r'"(\w+)"\s*:', style_inner):
            d = 0
            for ch in style_inner[:km.start()]:
                if ch == '{':
                    d += 1
                elif ch == '}':
                    d -= 1
            if d == 0:
                top_keys.append(km.group(1))
        for k in set(top_keys):
            if top_keys.count(k) > 1:
                report(filepath, i, f'duplicate "{k}" key in style object')


def check_json_structure(filepath, lines):
    """Check 15: block comment JSON structural issues.
    - Invalid JSON (parse error) - likely malformed braces or quotes
    - Style sub-properties at top level - extra } closes style{} early,
      causing border/spacing/typography to escape, save function doesn't
      output inline styles, triggers Block validation failed.
    """
    # Blocks that use typography/spacing as top-level attributes (not inside style{})
    TOPLEVEL_STYLE_BLOCKS = frozenset(["navigation"])
    STYLE_SUB_KEYS = {"spacing", "border", "typography", "dimensions", "position"}
    for i, line in enumerate(lines, 1):
        if "<!-- wp:" not in line:
            continue
        block_m = re.search(r'wp:(\S+)', line)
        block_name = block_m.group(1).rstrip("/").rstrip(",") if block_m else ""
        if block_name in TOPLEVEL_STYLE_BLOCKS:
            continue
        json_str = extract_block_json(line)
        if not json_str:
            continue
        try:
            j = json.loads(json_str)
        except json.JSONDecodeError as e:
            report(filepath, i, f"invalid block JSON: {e.msg} at position {e.pos}")
            continue
        # Check if style sub-keys escaped to top level
        top_keys = set(j.keys())
        style_obj = j.get('style')
        if not isinstance(style_obj, dict):
            continue
        style_keys = set(style_obj.keys())
        escaped = top_keys & STYLE_SUB_KEYS
        if escaped:
            report(filepath, i,
                   f'style sub-property escaped to top level (extra closing brace): '
                   f'{", ".join(sorted(escaped))}')


def check_style_css_completeness(filepath, lines):
    """Check 16: JSON style properties missing from HTML inline style.
    When JSON declares style.spacing.margin/padding or style.border,
    the HTML inline style should contain the corresponding CSS properties.
    Also catches blocks with style declarations but completely missing HTML style.
    Skips dynamic blocks (html:false) where style is applied server-side.
    """
    DYNAMIC_STYLE_BLOCKS = frozenset([
        "query-pagination", "core/query-pagination",
        "woocommerce/product-price", "woocommerce/price-filter",
        "woocommerce/active-filters", "woocommerce/attribute-filter",
        "woocommerce/stock-filter",
        # Cart blocks: JS save returns placeholder div without style
        "woocommerce/cart",
        "woocommerce/cart-order-summary-subtotal-block",
        "woocommerce/cart-order-summary-shipping-block",
        "woocommerce/cart-order-summary-taxes-block",
        "woocommerce/cart-order-summary-totals-block",
        "woocommerce/cart-order-summary-fee-block",
        "woocommerce/cart-order-summary-discount-block",
        "woocommerce/cart-order-summary-heading-block",
        "woocommerce/cart-order-summary-coupon-form-block",
        "woocommerce/proceed-to-checkout-block",
        "woocommerce/cart-totals-block",
        "woocommerce/filled-cart-block",
        "woocommerce/empty-cart-block",
        "woocommerce/cart-items-block",
        "woocommerce/cart-line-items-block",
        "woocommerce/cart-cross-sells-block",
        "woocommerce/cart-cross-sells-products-block",
        "woocommerce/cart-express-payment-block",
        "woocommerce/cart-accepted-payment-methods-block",
        # Checkout blocks: JS save returns placeholder div without style
        "woocommerce/checkout",
        "woocommerce/checkout-fields-block",
        "woocommerce/checkout-totals-block",
        "woocommerce/checkout-shipping-address-block",
        "woocommerce/checkout-terms-block",
        "woocommerce/checkout-contact-information-block",
        "woocommerce/checkout-billing-address-block",
        "woocommerce/checkout-actions-block",
        "woocommerce/checkout-additional-information-block",
        "woocommerce/checkout-order-note-block",
        "woocommerce/checkout-order-summary-block",
        "woocommerce/checkout-order-summary-cart-items-block",
        "woocommerce/checkout-order-summary-subtotal-block",
        "woocommerce/checkout-order-summary-shipping-block",
        "woocommerce/checkout-order-summary-taxes-block",
        "woocommerce/checkout-order-summary-coupon-form-block",
        "woocommerce/checkout-order-summary-totals-block",
        "woocommerce/checkout-order-summary-fee-block",
        "woocommerce/checkout-order-summary-discount-block",
        "woocommerce/checkout-payment-block",
        "woocommerce/checkout-express-payment-block",
        "woocommerce/checkout-shipping-method-block",
        "woocommerce/checkout-shipping-methods-block",
        "woocommerce/checkout-pickup-options-block",
    ])
    for i, line in enumerate(lines, 1):
        if "<!-- wp:" not in line:
            continue
        # Skip dynamic blocks (html:false) - style applied by server render
        block_m = re.search(r'wp:(\S+)', line)
        block_name = block_m.group(1).rstrip("/").rstrip(",") if block_m else ""
        if block_name in DYNAMIC_STYLE_BLOCKS:
            continue
        # Skip self-closing blocks (<!-- wp:xxx ... /-->)
        if re.search(r'<!--\s+wp:\S+\s+.*?/\s*-->', line):
            continue
        json_str = extract_block_json(line)
        if not json_str:
            continue
        try:
            j = json.loads(json_str)
        except json.JSONDecodeError:
            continue
        style = j.get('style', {})
        if not isinstance(style, dict):
            continue
        # Collect expected CSS property prefixes from JSON
        # Shorthand strings ("padding":"var(...)") expect shorthand CSS (padding:...)
        # Object values ("padding":{"top":"..."}) expect expanded CSS (padding-top:...)
        # Shorthand form/expanded form mismatch is handled by check #21, so skip here
        expected = []
        spacing = style.get('spacing')
        if isinstance(spacing, dict):
            for prop in ('margin', 'padding'):
                val = spacing.get(prop)
                if val is None:
                    continue
                # Shorthand: check #21 handles form mismatch, skip here
                if isinstance(val, str):
                    continue
                expected.append(f'{prop}-')
        if 'border' in style:
            # core/table: border outputs to <table>, not <figure> (check #9 handles this)
            if block_name != "table":
                expected.append('border-')
        if not expected:
            continue
        # Find HTML content after block comment
        html_lines = []
        for j2 in range(i + 1, min(i + 8, len(lines) + 1)):
            html_lines.append(lines[j2 - 1])
            if "<!-- /wp:" in lines[j2 - 1]:
                break
        html_text = "".join(html_lines)
        style_m = re.search(r'style="([^"]*)"', html_text)
        if not style_m:
            missing = ", ".join(sorted(set(p.rstrip('-') for p in expected)))
            report(filepath, i,
                   f"JSON has style declaration but HTML missing style attribute "
                   f"(expected CSS: {missing})")
            continue
        html_style = style_m.group(1)
        for css_prefix in sorted(set(expected)):
            if css_prefix not in html_style:
                json_key = css_prefix.rstrip('-')
                report(filepath, i,
                       f"JSON has style.{json_key} but HTML style missing "
                       f"{css_prefix}* property")


def check_column_width_flex_basis(filepath, lines):
    """Check 17: core/column with width attribute must have flex-basis in HTML.
    Gutenberg maps column width to flex-basis inline style.
    Missing flex-basis causes Block validation failed.
    """
    for i, line in enumerate(lines, 1):
        if "<!-- wp:column" not in line:
            continue
        # Skip self-closing
        if re.search(r'<!--\s+wp:column\s+.*?/\s*-->', line):
            continue
        if '"width"' not in line:
            continue
        # Find HTML content after block comment
        html_lines = []
        for j in range(i + 1, min(i + 6, len(lines) + 1)):
            html_lines.append(lines[j - 1])
            if "<!-- /wp:" in lines[j - 1]:
                break
        html_text = "".join(html_lines)
        if 'flex-basis' not in html_text:
            report(filepath, i,
                   'core/column has "width" attribute but HTML missing flex-basis style')


def check_dynamic_block_wrapper(filepath, lines):
    """Check 18: html:false dynamic blocks with InnerBlocks must not have wrapper div.
    Blocks like core/query-pagination have html:false and save returns null.
    Wrapper divs are treated as content by Gutenberg, causing validation failure.
    InnerBlocks should be directly between open/close comments.
    """
    DYNAMIC_INNERBLOCK_BLOCKS = frozenset([
        "core/query-pagination", "query-pagination",
    ])
    for i, line in enumerate(lines, 1):
        block_m = re.search(r'<!--\s+wp:(\S+)', line)
        if not block_m:
            continue
        block_name = block_m.group(1).rstrip("/").rstrip(",")
        if block_name not in DYNAMIC_INNERBLOCK_BLOCKS:
            continue
        # Skip self-closing
        if re.search(r'/\s*-->', line):
            continue
        # Find HTML content between open and close comments
        html_lines = []
        close_name = block_name.split("/")[-1]  # handle both "core/query-pagination" and "query-pagination"
        for j in range(i + 1, min(i + 10, len(lines) + 1)):
            next_line = lines[j - 1]
            if f"<!-- /wp:{close_name}" in next_line:
                break
            html_lines.append(next_line)
        html_text = "".join(html_lines).strip()
        # Check if first non-empty HTML element is a wrapper div for this block
        div_m = re.search(r'<div\s+class="wp-block-[^"]*query-pagination[^"]*"', html_text)
        if div_m:
            report(filepath, i,
                   f"{block_name} is dynamic (html:false), must not have wrapper div")


def check_woo_self_closing_with_save(filepath, lines):
    """Check 19: WooCommerce SSR blocks with non-null save output must not be self-closing.
    These blocks have JS save functions that return placeholder HTML.
    Self-closing causes Block validation failed because file content doesn't match save.
    Includes: product-price, price-filter, cart, cart-order-summary-*-block,
    proceed-to-checkout-block. Note: html:false blocks (save returns null) are
    excluded since Gutenberg skips validation for those.
    """
    WOO_BLOCKS_WITH_SAVE = frozenset([
        # Product/shop blocks
        "woocommerce/product-price",
        "woocommerce/price-filter",
        # Cart blocks (JS save returns placeholder <div>)
        "woocommerce/cart",
        "woocommerce/cart-order-summary-subtotal-block",
        "woocommerce/cart-order-summary-shipping-block",
        "woocommerce/cart-order-summary-taxes-block",
        "woocommerce/cart-order-summary-totals-block",
        "woocommerce/cart-order-summary-fee-block",
        "woocommerce/cart-order-summary-discount-block",
        "woocommerce/cart-order-summary-heading-block",
        "woocommerce/cart-order-summary-coupon-form-block",
        "woocommerce/proceed-to-checkout-block",
        "woocommerce/cart-totals-block",
        "woocommerce/filled-cart-block",
        "woocommerce/empty-cart-block",
        "woocommerce/cart-items-block",
        "woocommerce/cart-line-items-block",
        "woocommerce/cart-cross-sells-block",
        "woocommerce/cart-cross-sells-products-block",
        "woocommerce/cart-express-payment-block",
        "woocommerce/cart-accepted-payment-methods-block",
        # Checkout blocks (JS save returns placeholder <div>)
        "woocommerce/checkout",
        "woocommerce/checkout-fields-block",
        "woocommerce/checkout-totals-block",
        "woocommerce/checkout-shipping-address-block",
        "woocommerce/checkout-terms-block",
        "woocommerce/checkout-contact-information-block",
        "woocommerce/checkout-billing-address-block",
        "woocommerce/checkout-actions-block",
        "woocommerce/checkout-additional-information-block",
        "woocommerce/checkout-order-note-block",
        "woocommerce/checkout-order-summary-block",
        "woocommerce/checkout-order-summary-cart-items-block",
        "woocommerce/checkout-order-summary-subtotal-block",
        "woocommerce/checkout-order-summary-shipping-block",
        "woocommerce/checkout-order-summary-taxes-block",
        "woocommerce/checkout-order-summary-coupon-form-block",
        "woocommerce/checkout-order-summary-totals-block",
        "woocommerce/checkout-order-summary-fee-block",
        "woocommerce/checkout-order-summary-discount-block",
        "woocommerce/checkout-payment-block",
        "woocommerce/checkout-express-payment-block",
        "woocommerce/checkout-shipping-method-block",
        "woocommerce/checkout-shipping-methods-block",
        "woocommerce/checkout-pickup-options-block",
    ])
    for i, line in enumerate(lines, 1):
        if not re.search(r'<!--\s+wp:\S+\s+.*?/\s*-->', line):
            continue
        block_m = re.search(r'wp:(\S+)', line)
        if not block_m:
            continue
        block_name = block_m.group(1).rstrip("/").rstrip(",")
        if block_name in WOO_BLOCKS_WITH_SAVE:
            report(filepath, i,
                   f"{block_name} has non-null save output, must not be self-closing")


def check_unclosed_container_blocks(filepath, lines):
    """Check 20: container blocks opened but never closed.
    When a block comment (e.g. wp:group) is opened without a matching close comment,
    Gutenberg treats all subsequent blocks as children of the unclosed block.
    The parent block's save output becomes empty, triggering Block validation failed.
    """
    stack = []  # [(line_num, block_type)]
    for i, line in enumerate(lines, 1):
        # Match opening block comments (not self-closing)
        m_open = re.search(r'<!--\s+wp:(\S+)\s', line)
        if m_open:
            block_type = m_open.group(1).rstrip("/").rstrip(",")
            # Check if self-closing (contains /-->)
            if re.search(r'/\s*-->', line):
                continue
            stack.append((i, block_type))
        # Match closing block comments
        m_close = re.search(r'<!--\s+/wp:(\S+)\s*-->', line)
        if m_close:
            close_type = m_close.group(1).rstrip("/").rstrip(",")
            if stack:
                stack.pop()
    # Report any unclosed blocks
    for line_num, block_type in stack:
        report(filepath, line_num,
               f'unclosed block "{block_type}" — missing <!-- /wp:{block_type} -->, '
               f'causes all subsequent blocks to be nested inside it')


def check_woo_renamed_blocks(filepath, lines):
    """Check 22: WooCommerce blocks renamed with -block suffix.
    WooCommerce newer versions renamed several internal blocks (e.g.
    cart-order-summary-subtotal -> cart-order-summary-subtotal-block).
    Old names cause core/missing (Block Recovery) in the Site Editor.
    """
    WOO_OLD_TO_NEW = {
        "woocommerce/cart-order-summary-subtotal": "woocommerce/cart-order-summary-subtotal-block",
        "woocommerce/cart-order-summary-shipping": "woocommerce/cart-order-summary-shipping-block",
        "woocommerce/cart-order-summary-taxes": "woocommerce/cart-order-summary-taxes-block",
        "woocommerce/cart-order-summary-total": "woocommerce/cart-order-summary-totals-block",
        "woocommerce/cart-order-summary-fee": "woocommerce/cart-order-summary-fee-block",
        "woocommerce/cart-order-summary-discount": "woocommerce/cart-order-summary-discount-block",
        "woocommerce/cart-order-summary-heading": "woocommerce/cart-order-summary-heading-block",
        "woocommerce/cart-order-summary-coupon-form": "woocommerce/cart-order-summary-coupon-form-block",
        "woocommerce/proceed-to-checkout": "woocommerce/proceed-to-checkout-block",
        "woocommerce/cart-totals": "woocommerce/cart-totals-block",
        "woocommerce/filled-cart": "woocommerce/filled-cart-block",
        "woocommerce/cart-items": "woocommerce/cart-items-block",
        "woocommerce/cart-line-items": "woocommerce/cart-line-items-block",
        "woocommerce/cart-cross-sells": "woocommerce/cart-cross-sells-block",
        "woocommerce/cart-cross-sells-products": "woocommerce/cart-cross-sells-products-block",
        "woocommerce/cart-express-payment": "woocommerce/cart-express-payment-block",
        "woocommerce/empty-cart": "woocommerce/empty-cart-block",
        "woocommerce/cart-accepted-payment-methods": "woocommerce/cart-accepted-payment-methods-block",
        "woocommerce/cart-order-summary": "woocommerce/cart-order-summary-block",
        "woocommerce/checkout-fields": "woocommerce/checkout-fields-block",
        "woocommerce/checkout-totals": "woocommerce/checkout-totals-block",
        "woocommerce/checkout-shipping-address": "woocommerce/checkout-shipping-address-block",
        "woocommerce/checkout-terms": "woocommerce/checkout-terms-block",
        "woocommerce/checkout-contact-information": "woocommerce/checkout-contact-information-block",
        "woocommerce/checkout-billing-address": "woocommerce/checkout-billing-address-block",
        "woocommerce/checkout-actions": "woocommerce/checkout-actions-block",
        "woocommerce/checkout-additional-information": "woocommerce/checkout-additional-information-block",
        "woocommerce/checkout-order-note": "woocommerce/checkout-order-note-block",
        "woocommerce/checkout-order-summary": "woocommerce/checkout-order-summary-block",
        "woocommerce/checkout-order-summary-cart-items": "woocommerce/checkout-order-summary-cart-items-block",
        "woocommerce/checkout-order-summary-subtotal": "woocommerce/checkout-order-summary-subtotal-block",
        "woocommerce/checkout-order-summary-shipping": "woocommerce/checkout-order-summary-shipping-block",
        "woocommerce/checkout-order-summary-taxes": "woocommerce/checkout-order-summary-taxes-block",
        "woocommerce/checkout-order-summary-coupon-form": "woocommerce/checkout-order-summary-coupon-form-block",
        "woocommerce/checkout-order-summary-total": "woocommerce/checkout-order-summary-totals-block",
        "woocommerce/checkout-order-summary-fee": "woocommerce/checkout-order-summary-fee-block",
        "woocommerce/checkout-order-summary-discount": "woocommerce/checkout-order-summary-discount-block",
        "woocommerce/checkout-payment": "woocommerce/checkout-payment-block",
        "woocommerce/checkout-express-payment": "woocommerce/checkout-express-payment-block",
        "woocommerce/checkout-shipping-method": "woocommerce/checkout-shipping-method-block",
        "woocommerce/checkout-shipping-methods": "woocommerce/checkout-shipping-methods-block",
        "woocommerce/checkout-pickup-options": "woocommerce/checkout-pickup-options-block",
    }
    for i, line in enumerate(lines, 1):
        if "<!-- wp:" not in line:
            continue
        block_m = re.search(r'wp:(\S+)', line)
        if not block_m:
            continue
        block_name = block_m.group(1).rstrip("/").rstrip(",")
        if block_name in WOO_OLD_TO_NEW:
            report(filepath, i,
                   f'WooCommerce block renamed: "{block_name}" -> '
                   f'"{WOO_OLD_TO_NEW[block_name]}"')


def check_padding_shorthand_mismatch(filepath, lines):
    """Check 21: JSON shorthand padding/margin vs expanded HTML inline style mismatch.
    When JSON declares shorthand padding ("padding":"var(...)"), Gutenberg save outputs
    shorthand (padding:var(...)). If HTML has expanded form (padding-top:...;...),
    Block validation failed occurs, and vice versa.
    """
    for i, line in enumerate(lines, 1):
        if "<!-- wp:" not in line:
            continue
        # Skip self-closing blocks
        if re.search(r'/\s*-->', line):
            continue
        json_str = extract_block_json(line)
        if not json_str:
            continue
        try:
            j = json.loads(json_str)
        except json.JSONDecodeError:
            continue
        style = j.get('style', {})
        if not isinstance(style, dict):
            continue
        spacing = style.get('spacing')
        if not isinstance(spacing, dict):
            continue
        # Check padding and margin for shorthand vs object form
        for prop in ('padding', 'margin'):
            val = spacing.get(prop)
            if val is None:
                continue
            is_shorthand = isinstance(val, str)
            # Find HTML content after block comment
            html_lines = []
            for j2 in range(i + 1, min(i + 8, len(lines) + 1)):
                html_lines.append(lines[j2 - 1])
                if "<!-- /wp:" in lines[j2 - 1]:
                    break
            html_text = "".join(html_lines)
            style_m = re.search(r'style="([^"]*)"', html_text)
            if not style_m:
                continue
            html_style = style_m.group(1)
            # Check if HTML uses expanded form (has prop-top/right/bottom/left)
            has_expanded = any(f'{prop}-' in html_style for side in ('top', 'right', 'bottom', 'left'))
            has_shorthand = prop + ':' in html_style
            if is_shorthand and has_expanded and not has_shorthand:
                report(filepath, i,
                       f'JSON has shorthand style.spacing.{prop} but HTML has expanded '
                       f'{prop}-top/right/bottom/left — must match form')
            elif not is_shorthand and has_shorthand and not has_expanded:
                report(filepath, i,
                       f'JSON has object style.spacing.{prop} but HTML has shorthand '
                       f'{prop}: — must match form')


def check_border_radius_var(filepath, lines):
    """Check 23: style.border.radius must not use CSS var().
    Gutenberg save function does not output border-radius when the value is a
    CSS variable (e.g. var(--wp--custom--border--radius--lg)). Additionally,
    WP's parse_blocks regex may fail to extract the JSON correctly when var()
    contains double hyphens, causing attrs to be silently set to null.
    Only plain values (e.g. "8px") are accepted.
    """
    for i, line in enumerate(lines, 1):
        if "<!-- wp:" not in line:
            continue
        json_str = extract_block_json(line)
        if not json_str:
            continue
        try:
            j = json.loads(json_str)
        except json.JSONDecodeError:
            continue
        style = j.get('style', {})
        if not isinstance(style, dict):
            continue
        border = style.get('border')
        if not isinstance(border, dict):
            continue
        radius = border.get('radius')
        if radius is None:
            continue
        if 'var(' in str(radius):
            report(filepath, i,
                   'style.border.radius uses CSS var() — Gutenberg save does not '
                   'output it; use custom.css class or selector instead')


def check_classname_on_unsupported_blocks(filepath, lines):
    """Check 24: className on blocks that don't output it in save function.
    Blocks like core/group and core/button accept className in JSON but their
    save function does not include it in the rendered HTML. This causes
    Block validation failed because the file HTML has the class but save doesn't.
    """
    UNSUPPORTED_CLASSNAME_BLOCKS = frozenset([
        "core/group", "group",
        "core/button", "button",
    ])
    for i, line in enumerate(lines, 1):
        if "<!-- wp:" not in line:
            continue
        if '"className"' not in line:
            continue
        block_m = re.search(r'wp:(\S+)', line)
        if not block_m:
            continue
        block_name = block_m.group(1).rstrip("/").rstrip(",")
        if block_name in UNSUPPORTED_CLASSNAME_BLOCKS:
            report(filepath, i,
                   f'className is not output by {block_name} save function — '
                   f'use custom.css selector instead')


def main():
    print(f"=== FSE Mechanical Audit ===")
    print(f"Theme dir: {THEME_DIR}")
    print()

    for dirname in TARGETS:
        dirpath = os.path.join(THEME_DIR, dirname)
        if not os.path.isdir(dirpath):
            continue
        for root, _dirs, files in sorted(os.walk(dirpath)):
            for fname in sorted(files):
                if not (fname.endswith(".html") or fname.endswith(".php")):
                    continue
                fpath = os.path.join(root, fname)
                relpath = os.path.relpath(fpath, THEME_DIR)
                with open(fpath, "r", encoding="utf-8") as f:
                    lines = f.readlines()
                check_var_parens(relpath, lines)
                check_json_single_quotes(relpath, lines)
                check_span_in_paragraph(relpath, lines)
                check_self_closing_space(relpath, lines)
                check_comment_header(relpath, lines, dirname == "patterns")
                check_json_html_sync(relpath, lines)
                check_color_class_completeness(relpath, lines)
                check_gradient_slug_suffix(relpath, lines)
                check_table_structure(relpath, lines)
                check_json_attr_nesting(relpath, lines, dirname == "patterns")
                check_separator_alpha_class(relpath, lines)
                check_json_style_html_missing(relpath, lines)
                check_style_nesting(relpath, lines)
                check_duplicate_style_keys(relpath, lines)
                check_json_structure(relpath, lines)
                check_style_css_completeness(relpath, lines)
                check_column_width_flex_basis(relpath, lines)
                check_dynamic_block_wrapper(relpath, lines)
                check_woo_self_closing_with_save(relpath, lines)
                check_unclosed_container_blocks(relpath, lines)
                check_padding_shorthand_mismatch(relpath, lines)
                check_woo_renamed_blocks(relpath, lines)
                check_border_radius_var(relpath, lines)
                check_classname_on_unsupported_blocks(relpath, lines)

    print()
    if VIOLATIONS == 0:
        print("All checks passed")
    else:
        print(f"\033[0;31mFound {VIOLATIONS} violation(s)\033[0m")
    sys.exit(VIOLATIONS)


if __name__ == "__main__":
    main()
