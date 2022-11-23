<?php

namespace Tests\Unit;

use App\domains\factories\ApplicableRatePlanDiscountFactory;
use App\domains\FeeCaluculation;
use App\domains\MiniFitPlane;
use App\domains\SharpnessPlane;
use App\queryServices\ContractLineQueryService;
// use PHPUnit\Framework\TestCase;
use Tests\TestCase;

class FeeCalculationTest extends TestCase
{
    public function test_monthlyModelPrice()
    {
        $planDiscountList = ApplicableRatePlanDiscountFactory::create('08000001111');
        $feeCalculation = new FeeCaluculation(
            new SharpnessPlane($planDiscountList)
        );
        $monthlyModelPrice = $feeCalculation->monthlyModelPrice(80000, 24);

        $this->assertEquals($monthlyModelPrice, 3333);
    }

    // 一括購入の場合は毎月の機種代金は0
    public function test_monthlyModelPriceOnNoNumberOfDivisions()
    {
        $planDiscountList = ApplicableRatePlanDiscountFactory::create('08000001111');

        $feeCalculation = new FeeCaluculation(
            new SharpnessPlane($planDiscountList)
        );
        $monthlyModelPrice = $feeCalculation->monthlyModelPrice(80000);

        $this->assertEquals($monthlyModelPrice, 0);
    }

    // 料金プラン価格 割引なし
    public function test_ratePlanePriceOnMerihari()
    {
        // メリハリプラン
        $planDiscountList = ApplicableRatePlanDiscountFactory::create('08000001111');

        $feeCalculation = new FeeCaluculation(
            new SharpnessPlane($planDiscountList)
        );
        $ratePlanePrice = $feeCalculation->ratePlanePrice();
        $expects = ['30gb' => 7238];
        $this->assertSame($expects, $ratePlanePrice);
    }

    // 料金プラン価格 割引なし
    public function test_ratePlanePriceOnMinifit()
    {
        $planDiscountList = ApplicableRatePlanDiscountFactory::create('08000001111');

        // ミニフィットプラン
        $feeCalculation = new FeeCaluculation(
            new MiniFitPlane($planDiscountList)
        );
        $ratePlanePrice = $feeCalculation->ratePlanePrice();
        $expects = [
            '3gb' => 5478,
            '2gb' => 4378,
            '1gb' => 3278,
        ];
        $this->assertSame($expects, $ratePlanePrice);
    }

    /**
     * プラン料金割引ありの料金 (光と家族)
     */
    public function test_ratePlanePriceOnMerihariWithDiscounting()
    {
        // メリハリプラン
        $planDiscountList = ApplicableRatePlanDiscountFactory::create('08000001111');

        $feeCalculation = new FeeCaluculation(
            new SharpnessPlane($planDiscountList)
        );
        $ratePlanePrice = $feeCalculation->ratePlanePrice();
        $ratePlanePriceWithDiscounting = $feeCalculation->discountedRatePlanPrice();

        // 割引前
        $expects = ['30gb' => 7238];

        // 割引後
        $discountedExpecets = ['30gb' => 5238];

        $this->assertSame($expects, $ratePlanePrice);
        $this->assertSame($discountedExpecets, $ratePlanePriceWithDiscounting);
    }

    /**
     * プラン料金割引ありの料金 (光のみ)
     */
    public function test_ratePlanePriceOnMinifitWithDiscounting()
    {
        // ミニフィットプラン
        $planDiscountList = ApplicableRatePlanDiscountFactory::create('08000001114');

        $feeCalculation = new FeeCaluculation(
            new MiniFitPlane($planDiscountList)
        );
        $ratePlanePrice = $feeCalculation->ratePlanePrice();
        $ratePlanePriceWithDiscounting = $feeCalculation->discountedRatePlanPrice();

        // 割引前
        $expects = [
            '3gb' => 5478,
            '2gb' => 4378,
            '1gb' => 3278,
        ];

        // 割引後
        $discountedExpecets =
            [
                '3gb' => 4478,
                '2gb' => 3378,
                '1gb' => 2278,
            ];

        $this->assertSame($expects, $ratePlanePrice);
        $this->assertSame($discountedExpecets, $ratePlanePriceWithDiscounting);
    }
}
