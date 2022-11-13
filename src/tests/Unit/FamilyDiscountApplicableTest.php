<?php

namespace Tests\Unit;

use App\domains\FamilyDiscountApplicable;
use App\infla\InMemoryContractorRepository;
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
        $familyDiscountApplicable = new FamilyDiscountApplicable(new InMemoryContractorRepository);
        // $familyDiscountApplicable = resolve(FamilyDiscountApplicable::class);
        $this->assertTrue($familyDiscountApplicable->applicable(1));
    }

    public function test_applicableFalse()
    {
        $familyDiscountApplicable = new FamilyDiscountApplicable(new InMemoryContractorRepository);
        $this->assertFalse($familyDiscountApplicable->applicable(4));
    }
       
}
