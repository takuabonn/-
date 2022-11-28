<?php

namespace App\infla;

use App\domains\repositories\IFContractorRepository;
use App\Models\Contractor;

class ContractorRepository implements IFContractorRepository
{

    public function findByContractorId($contractor_id)
    {
        return Contractor::find($contractor_id)->attributesToArray();
    }

    public function getByColumn($column)
    {
    }

    public function all()
    {
    }

    public function update($contractor)
    {
    }

    public function create($contractor)
    {
    }
    public function getByFamilyGroupId($family_group_id)
    {
        return Contractor::where('family_group_id', $family_group_id)->get()->toArray();
    }
}
