<?php

namespace App\infla;

use App\domains\repositories\IFContractLineRepository;

class InMemoryContractLineRepository implements IFContractLineRepository
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
            'family_group_id' => 1,
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
        [
            'id' => 5,
            'contractor_id' => 4,
            'contract_detail_id' => 5,
            'family_group_id' => null,
            'phone_number' => '08000001115',
            'contract_status' => 1
        ],
        [
            'id' => 6,
            'contractor_id' => 5,
            'contract_detail_id' => 6,
            'family_group_id' => null,
            'phone_number' => '08000001116',
            'contract_status' => 1
        ],

    ];
    public function getByContractorId($contractor_id)
    {
        //    $keyIndex = array_search($contractor_id, array_column($this->contractLineLists, 'contractor_id'));
        //    return $this->contractLineLists[$keyIndex];
    }

    public function getByFamilyGroupId($family_group_id)
    {
        $contractLineLists = array_filter($this->contractLineLists, function ($contractLine) use ($family_group_id) {
            return $contractLine['family_group_id'] === $family_group_id;
        });
        return array_values($contractLineLists);
    }

    public function findByPhoneNumber($phone_number)
    {
        $keyIndex = array_search($phone_number, array_column($this->contractLineLists, 'phone_number'));
        return $this->contractLineLists[$keyIndex];
    }
}
