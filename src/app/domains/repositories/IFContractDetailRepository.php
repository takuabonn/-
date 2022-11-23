<?php

namespace App\domains\repositories;

interface IFContractDetailRepository
{
    public function findByContractLineId($contract_line_id);
}
