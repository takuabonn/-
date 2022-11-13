<?php

namespace App\domains;

use App\domains\repositories\IFContractorRepository;

class WifiDiscountApplicable
{
    private $repository;
    public function __construct(IFContractorRepository $contractorRepository)
    {
        $this->repository = $contractorRepository;
        
    }
    /**
     *  適用条件: 光も契約している
     */
    public function applicable(int $contractor_id)
    {
        $contractor = $this->repository->findByContractorId($contractor_id);

        return true;
    }
}