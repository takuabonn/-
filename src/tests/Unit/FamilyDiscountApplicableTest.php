<?php

namespace Tests\Unit;

use App\domains\FamilyDiscountApplicable;
use App\infla\InMemoryContractorRepository;
use App\queryServices\ContractLineQueryService;
// use PHPUnit\Framework\TestCase;
use Tests\TestCase;

class FamilyDiscountApplicableTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */

    public function test_applicableTrue()
    {
        $queryService = resolve(ContractLineQueryService::class);
        $familyDiscountApplicable = new FamilyDiscountApplicable($queryService);
        $this->assertTrue($familyDiscountApplicable->applicable('08000001111'));
    }

    public function test_applicableFalse()
    {
        $queryService = resolve(ContractLineQueryService::class);
        $familyDiscountApplicable = new FamilyDiscountApplicable($queryService);
        $this->assertFalse($familyDiscountApplicable->applicable('08000001114'));
    }
}
