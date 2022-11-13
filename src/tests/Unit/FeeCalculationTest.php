<?php

namespace Tests\Unit;

use App\domains\FeeCaluculation;
use App\domains\MiniFitPlane;
use App\domains\SharpnessPlane;
use PHPUnit\Framework\TestCase;

class FeeCalculationTest extends TestCase
{
    public function test_monthlyModelPrice()
    {
        $feeCalculation = new FeeCaluculation(
            new SharpnessPlane()
        );
        $monthlyModelPrice = $feeCalculation->monthlyModelPrice(80000,24);

        $this->assertEquals($monthlyModelPrice, 3333);
    }

    // 一括購入の場合は毎月の機種代金は0
    public function test_monthlyModelPriceOnNoNumberOfDivisions()
    {
        $feeCalculation = new FeeCaluculation(
            new SharpnessPlane()
        );
        $monthlyModelPrice = $feeCalculation->monthlyModelPrice(80000);

        $this->assertEquals($monthlyModelPrice, 0);
    }

    // 料金プラン価格 割引なし
    public function test_ratePlanePriceOnMerihari()
    {
        // メリハリプラン
        $feeCalculation = new FeeCaluculation(
            new SharpnessPlane()
        );
        $ratePlanePrice = $feeCalculation->ratePlanePrice();
        $expects = ['30gb' => 7238];
        $this->assertSame($expects, $ratePlanePrice);

    }

    // 料金プラン価格 割引なし
    public function test_ratePlanePriceOnMinifit()
    {
        // ミニフィットプラン
        $feeCalculation = new FeeCaluculation(
            new MiniFitPlane()
        );
        $ratePlanePrice = $feeCalculation->ratePlanePrice();
        $expects = [
            '3gb' => 5478,
            '2gb' => 4378,
            '1gb' => 3278,
        ];
        $this->assertSame($expects,$ratePlanePrice);
    }

    // // 料金プラン価格 割引あり(光割)
    // public function test_ratePlanePriceOnWifiDiscountedMerihari()
    // {
    //     // メリハリプラン
    //     $feeCalculation = new FeeCaluculation(
    //         new SharpnessPlane()
    //     );
    //     $ratePlanePrice = $feeCalculation->ratePlanePrice();
    //     $expects = ['30gb' => 6238];
    //     $this->assertSame($expects, $ratePlanePrice);

    // }
}
