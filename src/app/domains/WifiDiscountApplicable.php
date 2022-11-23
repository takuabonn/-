<?php

namespace App\domains;

use App\domains\repositories\IFContractorRepository;
use App\queryServices\ContractLineQueryService;

class WifiDiscountApplicable
{
    private  $contractLineQueryService;
    public function __construct(ContractLineQueryService $contractLineQueryService)
    {
        $this->contractLineQueryService = $contractLineQueryService;
    }
    /**
     *  適用条件: 光も契約している
     */
    public function applicable($phone_number)
    {
        return $this->contractLineQueryService->existsWifiContractInFamilyGroup($phone_number);
    }
}
