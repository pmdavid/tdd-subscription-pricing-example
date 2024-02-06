<?php

declare(strict_types=1);

namespace App\Checkout\Application;

use App\Checkout\Domain\TieredPricing;

final class TotalPriceCalculator
{
    private TieredPricing $tieredPricing;

    public function __construct(int $subscriptionsNumber)
    {
        $this->tieredPricing = new TieredPricing($subscriptionsNumber);
    }

    public function calculateTotalPrice(): array
    {
        return [
            'total_price' => $this->tieredPricing->totalPrice()
        ];
    }
}
