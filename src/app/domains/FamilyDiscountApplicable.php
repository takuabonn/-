<?php
namespace App\domains;

use App\domains\repositories\IFContractorRepository;
use Illuminate\Support\Facades\Log;

class FamilyDiscountApplicable
{
    private $repository;
    public function __construct(IFContractorRepository $contractorRepository)
    {
        $this->repository = $contractorRepository;
        
    }

    /**
     *  適用条件: 家族で回線が3回線以上
     */
    public function applicable($contractor_id)
    {
        $contractor = $this->repository->findByContractorId($contractor_id);
      
        if($contractor['family_group_id'] !== null) {
            $family = $this->repository->getByFamilyGroupId($contractor['family_group_id']);
            if(count($family) >= 3) {
                return true;
            }
        }

        return false;
    }
}