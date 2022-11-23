<?php

namespace Tests\Unit;

use App\domains\WifiDiscountApplicable;
use App\infla\InMemoryContractorRepository;
use App\queryServices\ContractLineQueryService;
// use PHPUnit\Framework\TestCase;
use Tests\TestCase;

class WifiDiscountApplicableTest extends TestCase
{
    /**
     * 回線の契約者が家族グループがない場合で光回線を契約している場合
     *
     * @return void
     */
    public function test_applicableOnHaveWifiWithoutGrpoup()
    {
        $queryService = resolve(ContractLineQueryService::class);
        $wifiDiscountApplicable = new WifiDiscountApplicable($queryService);
        $this->assertTrue($wifiDiscountApplicable->applicable('08000001114'));
    }

    /**
     * 回線の契約者が家族グループがない場合で光契約していない場合
     *
     * @return void
     */
    public function test_applicableOnDoesnotHaveWifiWithoutGrpoup()
    {
        $queryService = resolve(ContractLineQueryService::class);
        $wifiDiscountApplicable = new WifiDiscountApplicable($queryService);
        $this->assertFalse($wifiDiscountApplicable->applicable('08000001116'));
    }

    /**
     * 回線の契約者が家族グループがあり家族内で光契約をしている場合
     *
     * @return void
     */
    public function test_applicableOnHaveWifiWithGroup()
    {
        $queryService = resolve(ContractLineQueryService::class);
        $wifiDiscountApplicable = new WifiDiscountApplicable($queryService);
        $this->assertTrue($wifiDiscountApplicable->applicable('08000001111'));
    }
}
