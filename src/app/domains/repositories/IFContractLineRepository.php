<?php

namespace App\domains\repositories;

interface IFContractLineRepository
{
    public function getByContractorId(int $contractor_id);

    public function getByFamilyGroupId(int $family_group_id);

    public function findByPhoneNumber(int $phone_number);

}

