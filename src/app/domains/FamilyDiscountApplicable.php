<?php
namespace App\domains;

use App\domains\repositories\IFContractorRepository;
use App\queryServices\ContractLineQueryService;
use Illuminate\Support\Facades\Log;

class FamilyDiscountApplicable
{
    private  $contractLineQueryService;
    public function __construct(ContractLineQueryService $contractLineQueryService)
    {
        $this->contractLineQueryService = $contractLineQueryService;
        
    }

    /**
     *  適用条件: 家族で回線が3回線以上
     */
    public function applicable($phone_number)
    {
        $contractLineOnFamily = $this->contractLineQueryService->familyContractLines($phone_number);
        if(count($contractLineOnFamily) >= 3) {
            return true;
        }
        return false;
    }
}