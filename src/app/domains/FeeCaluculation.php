<?php

namespace App\domains;

class FeeCaluculation
{
    private RatePlane $ratePlane;

    public function __construct(RatePlane $ratePlane)
    {
        $this->ratePlane = $ratePlane;
    }

    /**
     * 毎月の機種代金
     * @param int $model_price 本体価格
     * @param int $number_of_divisions 分割回数
     *
     * @return int
     */
    public function monthlyModelPrice(int $model_price, int $number_of_divisions = 0)
    {
        if (!$number_of_divisions) {
            return 0;
        }
        return floor($model_price / $number_of_divisions);
    }

    /**
     * 料金プランの料金
     * @param RatePlane $ratePlane 料金プラン
     * 
     * @return array{
     *   GB: int,
     * } $property 速度制限ギガ数
     */
    public function ratePlanePrice()
    {
        return $this->ratePlane->priceEachUsableTraffic();
    }

    /**
     * 割引後の料金プランの料金
     * @param RatePlane $ratePlane 料金プラン
     * 
     * @return array{
     *   GB: int,
     * } $property 速度制限ギガ数
     */
    public function discountedRatePlanPrice()
    {
        return $this->ratePlane->caluculationDiscountAmount();
    }
}
