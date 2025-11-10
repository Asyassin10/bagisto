<?php

    use App\Http\Controllers\JsonSearchController;
use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\Route;
    use Illuminate\Support\Str;
use Webkul\Admin\Http\Resources\CustomProductResource;
use Webkul\Attribute\Models\AttributeFamily;
use Webkul\Product\Models\Product;
 
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/* Route::controller(controller: CompareController::class)->prefix(prefix: 'compare-items')->group(function () {});
 */

// Smart search routes are now handled by GSN package

