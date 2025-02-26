<?php

namespace App\Shipping;

use Webkul\Shipping\Carriers\FlatRate as BaseFlatRate;
use Webkul\Checkout\Models\CartShippingRate;
use Webkul\Checkout\Facades\Cart;

class CustomFlatRate extends BaseFlatRate
{
    /**
     * Shipping method code.
     *
     * @var string
     */
    protected $code = 'customflatrate';

    /**
     * Calculate the shipping rate.
     *
     * @return \Webkul\Checkout\Models\CartShippingRate|false
     */
    public function calculate()
    {
        if (! $this->isAvailable()) {
            return false;
        }

        // Implement your custom logic here
        return $this->getRate();
    }

    /**
     * Get the shipping rate.
     *
     * @return \Webkul\Checkout\Models\CartShippingRate
     */
    public function getRate(): CartShippingRate
    {
        $cart = Cart::getCart();

        $cartShippingRate = new CartShippingRate;

        $cartShippingRate->carrier = $this->getCode();
        $cartShippingRate->carrier_title = $this->getConfigData('title');
        $cartShippingRate->method = $this->getMethod();
        $cartShippingRate->method_title = $this->getConfigData('title');
        $cartShippingRate->method_description = $this->getConfigData('description');

        // Custom rate calculation logic
        $cartShippingRate->price = 0;
        $cartShippingRate->base_price = 100000;

        return $cartShippingRate;
    }
}
