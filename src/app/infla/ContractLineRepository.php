<?php

namespace App\infla;

use App\domains\repositories\IFContractLineRepository;
use App\Models\ContractLine;

class ContractLineRepository implements IFContractLineRepository
{

    public function getByContractorId($contractor_id)
    {
    }

    public function getByFamilyGroupId($family_group_id)
    {
        return ContractLine::where('family_group_id', $family_group_id)->get()->toArray();
    }

    public function findByPhoneNumber(int $phone_number)
    {
        return ContractLine::where('phone_number', $phone_number)->first()->attributesToArray();
    }
}
