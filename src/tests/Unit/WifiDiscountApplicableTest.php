<?php

namespace Tests\Unit;

use App\domains\WifiDiscountApplicable;
use App\infla\InMemoryContractorRepository;
// use PHPUnit\Framework\TestCase;
use Tests\TestCase;
class WifiDiscountApplicableTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_applicableTrue()
    {
        $wifiDiscountApplicable = new WifiDiscountApplicable(new InMemoryContractorRepository);
        // $wifiDiscountApplicable = resolve(WifiDiscountApplicable::class);
        $this->assertTrue($wifiDiscountApplicable->applicable(1));
    }
}
