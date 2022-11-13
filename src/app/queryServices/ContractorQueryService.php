<?php

namespace App\queryServices;

use App\domains\repositories\IFContractorRepository;

class ContractorQueryService
{
    private $contractorRepository;
    public function __construct(IFContractorRepository $contractorRepository)
    {
        $this->contractorRepository = $contractorRepository;
        
    }

    public function findByContractorId(int $contractor_id)
    {
        $this->contractorRepository->findByContractorId($contractor_id);
    }

}