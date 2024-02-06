<?php

namespace App\Tests\Unit\Checkout\Domain;

use App\Checkout\Domain\TieredPricing;
use App\Tests\Unit\Shared\Infrastructure\PhpUnit\UnitTestCase;
use Faker\Factory;
use Faker\Generator;

class TieredPricingTest extends UnitTestCase
{
    protected Generator $faker;

    protected function setUp(): void
    {
        $this->faker = Factory::create();
    }

    /**
     * @test
     */
    public function unit_price_from_first_range(): void
    {
        $tieredPricing = new TieredPricing($this->faker->numberBetween(1, 2));
        /* NOTE: In each test, we would create a mock of the class, if necessary (if the class has dependencies that we do not want to call):
        // $mock = $this->mock('className');
        */

        $this->assertEquals(299, $tieredPricing->pricePerUnit());
    }

    /**
     * @test
     */
    public function unit_price_from_second_range(): void
    {
        $tieredPricing = new TieredPricing($this->faker->numberBetween(3, 10));

        $this->assertEquals(239, $tieredPricing->pricePerUnit());
    }

    /**
     * @test
     */
    public function unit_price_from_third_range(): void
    {
        $tieredPricing = new TieredPricing($this->faker->numberBetween(11, 25));

        $this->assertEquals(219, $tieredPricing->pricePerUnit());
    }

    /**
     * @test
     */
    public function unit_price_from_fourth_range(): void
    {
        $tieredPricing = new TieredPricing($this->faker->numberBetween(26, 50));

        $this->assertEquals(199, $tieredPricing->pricePerUnit());
    }

    /**
     * @test
     */
    public function unit_price_from_last_range(): void
    {
        $tieredPricing = new TieredPricing($this->faker->numberBetween(51, 100));

        $this->assertEquals(149, $tieredPricing->pricePerUnit());
    }

    /**
     * @test
     */
    public function total_price_first_range(): void
    {
        $subscriptionsQuantity = $this->faker->numberBetween(1, 2);

        $tieredPricing = new TieredPricing($subscriptionsQuantity);

        $this->assertEquals($subscriptionsQuantity * $tieredPricing->pricePerUnit(), $tieredPricing->totalPrice());
    }

    /**
     * @test
     */
    public function total_price_second_range(): void
    {
        $subscriptionsQuantity = $this->faker->numberBetween(3, 10);

        $tieredPricing = new TieredPricing($subscriptionsQuantity);

        $this->assertEquals($subscriptionsQuantity * $tieredPricing->pricePerUnit(), $tieredPricing->totalPrice());
    }

    /**
     * @test
     */
    public function total_price_third_range(): void
    {
        $subscriptionsQuantity = $this->faker->numberBetween(11, 25);

        $tieredPricing = new TieredPricing($subscriptionsQuantity);

        $this->assertEquals($subscriptionsQuantity * $tieredPricing->pricePerUnit(), $tieredPricing->totalPrice());
    }

    /**
     * @test
     */
    public function total_price_fourth_range(): void
    {
        $subscriptionsQuantity = $this->faker->numberBetween(26, 50);

        $tieredPricing = new TieredPricing($subscriptionsQuantity);

        $this->assertEquals($subscriptionsQuantity * $tieredPricing->pricePerUnit(), $tieredPricing->totalPrice());
    }

    /**
     * @test
     */
    public function total_price_last_range(): void
    {
        $subscriptionsQuantity = $this->faker->numberBetween(51, 100);

        $tieredPricing = new TieredPricing($subscriptionsQuantity);

        $this->assertEquals($subscriptionsQuantity * $tieredPricing->pricePerUnit(), $tieredPricing->totalPrice());
    }
}
