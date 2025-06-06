<?php

/**
 * Store front routes.
 */

use Illuminate\Support\Facades\Route;

require 'store-front-routes.php';

/**
 * Customer routes. All routes related to customer
 * in storefront will be placed here.
 */
require 'customer-routes.php';

/**
 * Checkout routes. All routes related to checkout like
 * cart, coupons, etc will be placed here.
 */
require 'checkout-routes.php';

Route::get('/custom-page-shop', function () {
    return view('store::custom');
});
