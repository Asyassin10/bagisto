# GSN Theme Resources

This directory contains custom theme resources for the GSN (Guide Solutions Métier) frontend.

## Directory Structure

```
Resources/
├── views/
│   └── shop/               # Shop frontend view overrides
│       ├── products/       # Product page customizations
│       ├── layouts/        # Layout customizations
│       ├── components/     # Component customizations
│       └── partials/       # Partial view customizations
├── assets/
│   ├── css/               # Custom stylesheets
│   ├── js/                # Custom JavaScript
│   └── images/            # Theme images
└── lang/                  # Theme translations
```

## Using Custom Views

To override a Shop package view, create the same file structure here.

For example, to customize the product view:
- Original: `packages/Webkul/Shop/src/Resources/views/products/view.blade.php`
- Override: `packages/Webkul/GSN/src/Resources/views/shop/products/view.blade.php`

## Custom Views

Place your custom Blade templates here:
- `view_gestion_ptr.blade.php` - Custom product view for partner management
- `view_signature.blade.php` - Custom signature view
- Any other custom views

The GSN Service Provider will automatically register these views with priority over core Shop views.
