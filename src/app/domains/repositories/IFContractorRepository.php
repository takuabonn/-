<?php

namespace App\domains\repositories;

interface IFContractorRepository
{
    public function findByContractorId(int $contractor_id);

    public function getByColumn($column);

    public function all();

    public function create($contractor);

    public function update($contractor);

    public function getByFamilyGroupId(int $family_group_id);
}
