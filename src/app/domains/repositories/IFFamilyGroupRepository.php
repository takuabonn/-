<?php

namespace App\domains\repositories;

interface IFFamilyGroupRepository
{
    public function findByContractLineId($contract_line_id);
}