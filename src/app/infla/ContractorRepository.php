<?php

namespace App\infla;

use App\domains\repositories\IFContractorRepository;

class ContractorRepository implements IFContractorRepository
{

    private $contractorLists = [
        [
            'id' => 1,
            'family_group_id' => 1,
            'name' => '太郎',
            'zip_code' => '0750094',
            'birth_day' => '1998/03/22',
            'prefectures' => '東京都',
            'city' => '港区',
            'street_bunch' => '5-5',
        ],
        [
            'id' => 2,
            'family_group_id' => 1,
            'name' => '泰子',
            'zip_code' => '0750094',
            'birth_day' => '1998/03/22',
            'prefectures' => '東京都',
            'city' => '港区',
            'street_bunch' => '5-5',
        ],
        [
            'id' => 3,
            'family_group_id' => 1,
            'name' => '理子',
            'zip_code' => '0750094',
            'birth_day' => '1998/03/22',
            'prefectures' => '東京都',
            'city' => '港区',
            'street_bunch' => '5-5',
        ],
        [
            'id' => 4,
            'family_group_id' => null,
            'name' => '拓実',
            'zip_code' => '0750094',
            'birth_day' => '1998/03/22',
            'prefectures' => '東京都',
            'city' => '北港区',
            'street_bunch' => '5-5',
        ],

    ];
    public function findByContractorId($contractor_id)
    {
        return array_filter($this->contractorLists, function ($contractor) use ($contractor_id) {
            return $contractor['id'] === $contractor_id;
        })[0];
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
    }
}
