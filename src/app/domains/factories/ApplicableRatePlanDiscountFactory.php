<?php

namespace App\domains\factories;

use App\domains\FamilyDiscount;
use App\domains\FamilyDiscountApplicable;
use App\domains\PlanDiscountList;
use App\domains\WifiDiscount;
use App\domains\WifiDiscountApplicable;
use App\queryServices\ContractLineQueryService;
use stdClass;

class ApplicableRatePlanDiscountFactory
{

    public static function create($phone_number)
    {
        $contractLineQueryService = resolve(ContractLineQueryService::class);
        $wifiDiscountApplicable = new WifiDiscountApplicable($contractLineQueryService);
        $familyDiscountApplicable = new FamilyDiscountApplicable($contractLineQueryService);

        $previouslyAppliedPlanDiscountList = [];

        // 家族割の適用があるか
        if ($familyDiscountApplicable->applicable($phone_number)) {
            $previouslyAppliedPlanDiscountList[] = new FamilyDiscount();
        }

        // 光割の適用があるか
        if ($wifiDiscountApplicable->applicable($phone_number)) {
            $previouslyAppliedPlanDiscountList[] = new WifiDiscount();
        }

        return new PlanDiscountList($previouslyAppliedPlanDiscountList);
    }
}
