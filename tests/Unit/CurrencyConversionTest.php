<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class CurrencyConversionTest extends TestCase
{

    public function test_money_converted_to_cent(): void
    {
        $money = 100.99;

        $this->assertEquals(10099, calculateMoneyInCents($money));
    }

    public function test_money_converted_from_cent(): void 
    {
        $money = 11;
        print(convertMoneyFromCents($money));
        $this->assertEquals(0.11, convertMoneyFromCents($money));

    }
}
