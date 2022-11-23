<?php

namespace Tests\Unit;

use App\domains\factories\ApplicableRatePlanDiscountFactory;
use App\domains\FamilyDiscount;
use App\domains\WifiDiscount;
use App\queryServices\ContractLineQueryService;
// use PHPUnit\Framework\TestCase;
use Tests\TestCase;
use stdClass;

class ApplicableRatePlanDiscountFactoryTest extends TestCase
{
    /**
     * 適用割引 光と家族
     *
     * @return void
     */
    public function test_appliedRatePlanDiscount()
    {
        // 家族割と光割が既に適用されている契約者
        $ratePlanDiscountList = ApplicableRatePlanDiscountFactory::create('08000001111');
        $this->assertTrue($ratePlanDiscountList->getPlanDiscountList()[0] instanceof FamilyDiscount);
        $this->assertTrue($ratePlanDiscountList->getPlanDiscountList()[1] instanceof WifiDiscount);
        $this->assertEquals(count($ratePlanDiscountList->getPlanDiscountList()), 2);
    }

    /**
     * 適用割引 光と家族なし
     *
     * @return void
     */
    public function test_appliedRatePlanDiscountOnlyWifi()
    {
        // 家族割と光割が既に適用されている契約者
        $ratePlanDiscountList = ApplicableRatePlanDiscountFactory::create('08000001114');
        $this->assertTrue($ratePlanDiscountList->getPlanDiscountList()[0] instanceof WifiDiscount);
        $this->assertEquals(count($ratePlanDiscountList->getPlanDiscountList()), 1);
    }
}
