# cclee-shipping Multi-Carrier Shipping Plugin Design

_Date: 2026-04-02 | Phase: FedEx_

## Decision Record

| Decision | Choice | Reason |
|----------|--------|--------|
| Architecture | Unified plugin + per-carrier adapter | Extensible, single codebase |
| WC Integration | Each carrier = one `WC_Shipping_Method` | Reuse WC Shipping Zones UI |
| Credential Storage | Per-method settings in WC Shipping Zones | Zero custom UI for config |
| Service Types | Hardcoded preset | Avoid extra API calls, YAGNI |
| Rate Calculation | Real-time API at checkout | International rates fluctuate too much for static tables |
| Address Validation | Async JS + AJAX endpoint | Non-blocking, no checkout conversion impact |
| Phase 1 Scope | FedEx Rate + Address Validation (Ship deferred) | Validate architecture end-to-end first |

## Directory Structure

```
wp-content/plugins/cclee-shipping/
├── cclee-shipping.php              # Entry point, register shipping methods
├── uninstall.php                   # Clean transients + options
├── includes/
│   ├── class-carrier-abstract.php  # Abstract: auth, rate, validate interfaces
│   ├── class-fedex-carrier.php     # FedEx adapter (OAuth + Rate + Address Validation)
│   ├── class-carrier-factory.php   # Carrier factory
│   ├── class-package.php           # Package dimensions/weight calculation
│   ├── class-rate-modifier.php     # Rate markup (fixed amount or percentage)
│   └── class-address-validator.php # AJAX endpoint for async address validation
├── assets/
│   ├── css/admin.css
│   └── js/
│       ├── admin.js
│       └── checkout.js             # Async address validation frontend
└── languages/
    └── cclee-shipping.pot          # i18n template placeholder
```

## WC Shipping Zones Integration

Each carrier registers as a separate `WC_Shipping_Method`:

| Method ID | Carrier |
|-----------|---------|
| `cclee_shipping_fedex` | FedEx |
| `cclee_shipping_dhl` | DHL (future) |
| `cclee_shipping_ups` | UPS (future) |

Admin flow: **WooCommerce > Settings > Shipping > [Zone] > Add shipping method > cclee_shipping_fedex > Manage**.

### Per-Method Settings

| Setting | Type | Default |
|---------|------|---------|
| API Key (Client ID) | text | — |
| Secret Key (Client Secret) | password | — |
| Account Number | text | — |
| Environment | select | sandbox |
| Enabled Services | multi-checkbox | INTERNATIONAL_PRIORITY, INTERNATIONAL_ECONOMY |
| Rate Modifier Type | select | fixed |
| Rate Modifier Value | number | 0 |
| Default Package Type | select | YOUR_PACKAGING |
| Default Package Dimensions (L/W/H) | number x3 | 30/20/10 cm |
| Debug Mode | checkbox | off |

## FedEx Adapter (Phase 1)

### APIs

| API | Trigger | Purpose |
|-----|---------|---------|
| OAuth 2.0 Token | Cache miss on transient | Client ID + Secret → Bearer Token |
| Rate and Transit Times | Checkout page load | Real-time rates + transit time per service |
| Address Validation | Async JS on address input | Validate recipient address |

Ship API is the Phase 2 extension point (create shipment, generate labels).

### Preset Service Types

| Service | Scope | Notes |
|---------|-------|-------|
| FEDEX_INTERNATIONAL_PRIORITY | International | Express |
| FEDEX_INTERNATIONAL_ECONOMY | International | Economy |
| FEDEX_GROUND | US domestic | Ground |

Freight services (FEDEX_FREIGHT_*) excluded — they use a separate Freight API.

### Token Cache

- Transient key: `cclee_shipping_fedex_token`
- TTL: `expires_in - 60` seconds
- Prevents re-authentication on every rate request

### Rate Flow

```
Checkout loads
  → WC calls calculate_shipping()
    → Check token transient (cache hit? use it)
    → Build Rate API request (origin address from WC, destination from checkout, packages from cart)
    → class-package.php computes package line items
    → FedEx Rate API returns rates per service type
    → class-rate-modifier.php applies markup
    → Return rates as WC shipping rates
```

### Address Validation Flow

```
User types address in checkout
  → checkout.js debounced input handler
    → AJAX POST to cclee_shipping_validate_address
      → class-address-validator.php receives request
        → FedEx Address Validation API
          → Return valid/invalid + suggestions
            → checkout.js shows warning badge (non-blocking)
```

## Prefix Convention

All public namespace uses `cclee_shipping_` prefix (≥ 4 chars per conventions.md):

- Constants: `CCLEE_SHIPPING_VERSION`, `CCLEE_SHIPPING_PATH`
- Method IDs: `cclee_shipping_fedex`, `cclee_shipping_dhl`
- Transients: `cclee_shipping_fedex_token`
- Functions: `cclee_shipping_init()`
- Options: `woocommerce_cclee_shipping_fedex_settings` (WC convention)

## Error Handling

- API failure → hide this method from checkout (no rate shown), don't break checkout
- Debug mode → write to WC logger via `wc_get_logger()`
- Address validation failure → show warning badge, don't block checkout
- Token refresh failure → same as API failure

## Security

- API credentials stored in WC options (database), never exposed to frontend
- AJAX endpoint uses WC nonce verification
- All output escaped: `esc_html()`, `esc_attr()`, `esc_url()`
- All input sanitized: `sanitize_text_field()`, `absint()`
- Strings translatable: `__('String', 'cclee-shipping')`

## Uninstall

`uninstall.php` cleans:
- All `cclee_shipping_*` transients
- All `woocommerce_cclee_shipping_*` options (WC convention)
- No user data or order meta to clean (rates are not persisted)

## Future Phases

| Phase | Scope |
|-------|-------|
| Phase 2 | FedEx Ship API (labels, tracking) |
| Phase 3 | DHL Express adapter (requires MyDHL API access) |
| Phase 4 | UPS adapter |
| Phase 5 | SF Express adapter |
