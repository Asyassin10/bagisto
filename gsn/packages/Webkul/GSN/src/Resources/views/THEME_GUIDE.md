# GSN Theme Customization Guide

## Overview

The GSN package now supports custom theme views that override the default Bagisto Shop views.

## Directory Structure

```
packages/Webkul/GSN/src/Resources/
├── views/
│   ├── shop/              # Overrides for Shop package views
│   │   ├── products/      # Product-related views
│   │   ├── layouts/       # Layout overrides
│   │   ├── components/    # Component overrides
│   │   └── partials/      # Partial overrides
│   └── admin/             # Admin panel view overrides (if needed)
├── assets/
│   ├── css/               # Custom stylesheets
│   ├── js/                # Custom JavaScript
│   └── images/            # Theme images
└── lang/                  # Custom translations
```

## How to Override Shop Views

### 1. Find the Original View

Original Shop views are located in:
```
packages/Webkul/Shop/src/Resources/views/
```

### 2. Create Your Override

To override a Shop view, create the same file structure in:
```
packages/Webkul/GSN/src/Resources/views/shop/
```

### Examples

**Override product view:**
- Original: `packages/Webkul/Shop/src/Resources/views/products/view.blade.php`
- Override: `packages/Webkul/GSN/src/Resources/views/shop/products/view.blade.php`

**Override home page:**
- Original: `packages/Webkul/Shop/src/Resources/views/home/index.blade.php`
- Override: `packages/Webkul/GSN/src/Resources/views/shop/home/index.blade.php`

## Custom Views for GSN

### Known Custom Views

Based on your project, you may have custom views like:

1. **view_gestion_ptr.blade.php** - Partner management view
   - Place in: `shop/products/view_gestion_ptr.blade.php`

2. **view_signature.blade.php** - Signature/digital signature view
   - Place in: `shop/products/view_signature.blade.php`

## Using Views

### In Controllers

```php
// Use GSN-namespaced view
return view('gsn::shop.products.view_gestion_ptr', $data);

// Or let Laravel auto-discover (if override exists)
return view('shop::products.view', $data);
```

### In Blade Templates

```blade
@extends('shop::layouts.master')

{{-- Include GSN partial --}}
@include('gsn::shop.partials.custom-header')
```

## Publishing Assets

After creating custom views or assets, publish them:

```bash
# Publish views to resources/themes/gsn
php artisan vendor:publish --tag=gsn-views

# Publish assets to public/themes/gsn
php artisan vendor:publish --tag=gsn-assets

# Publish configuration
php artisan vendor:publish --tag=gsn-config
```

## Best Practices

1. **Only Override What You Need** - Don't copy entire views if you only need small changes
2. **Use Blade Components** - Create reusable components in `shop/components/`
3. **Keep Views Organized** - Follow the same structure as Shop package
4. **Document Changes** - Add comments explaining why you overrode a view
5. **Test After Updates** - When updating Bagisto, test your custom views

## View Priority

Laravel loads views in this order:
1. ✅ GSN package views (`packages/Webkul/GSN/src/Resources/views/shop/`)
2. Published theme views (`resources/themes/gsn/views/`)
3. Shop package views (`packages/Webkul/Shop/src/Resources/views/`)

This means your GSN views will always take priority!

## Migrations from Old Structure

If you previously modified views in:
- ❌ `packages/Webkul/Shop/src/Resources/views/` (WRONG - core files)
- ❌ `app/` directory (WRONG - not a package)

Move them to:
- ✅ `packages/Webkul/GSN/src/Resources/views/shop/` (CORRECT - custom package)

## Example: Custom Product View

Create: `packages/Webkul/GSN/src/Resources/views/shop/products/view_gestion_ptr.blade.php`

```blade
@extends('shop::layouts.master')

@section('page_title')
    {{ __('gsn::app.products.gestion-ptr') }}
@endsection

@section('content-wrapper')
    <div class="gsn-custom-product-view">
        <!-- Your custom HTML here -->
        <h1>{{ $product->name }}</h1>

        <!-- GSN-specific partner management UI -->
        @include('gsn::shop.products.partials.partner-info')
    </div>
@endsection
```

## Need Help?

Check the Bagisto documentation for view customization:
https://devdocs.bagisto.com/1.x/themes/

---

**Note:** After adding or modifying views, clear the view cache:
```bash
php artisan view:clear
php artisan config:clear
```
