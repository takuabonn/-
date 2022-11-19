<?php

namespace App\infla;

use App\domains\repositories\IFContractLineRepository;

class ContractLineRepository implements IFContractLineRepository
{

    private $contractLineLists = [
        [
            'id' => 1,
            'contractor_id' => 1,
            'family_group_id' => 1,
            'contract_detail_id' => 1,
            'phone_number' => '08000001111',
            'contract_status' => 1

        ],
        [
            'id' => 2,
            'contractor_id' => 2,
            'family_group_id' => 1,
            'contract_detail_id' => 2,
            'phone_number' => '08000001112',
            'contract_status' => 1

        ],
        [
            'id' => 3,
            'contractor_id' => 3,
            'family_group_id' => null,
            'contract_detail_id' => 3,
            'phone_number' => '08000001113',
            'contract_status' => 1

        ],
        [
            'id' => 4,
            'contractor_id' => 4,
            'contract_detail_id' => 4,
            'family_group_id' => null,
            'phone_number' => '08000001114',
            'contract_status' => 1
        ],

    ];
    public function getByContractorId($contractor_id)
    {
        return array_filter($this->contractLineLists, function ($contractLine) use ($contractor_id) {
            return $contractLine['contractor_id'] === $contractor_id;
        })[0];
    }

    public function getByFamilyGroupId($family_group_id)
    {
    }

    public function findByPhoneNumber(int $phone_number)
    {
    }
}
