<?php

namespace App\infla;

use App\domains\repositories\IFContractDetailRepository;

class InMemoryContractDetailRepository implements IFContractDetailRepository
{
    private $contractDetailList = [
        [
            'contract_line_id' => 1,
            'payment_type' => 1,
            'billing_deadline_type' => 1,
            'plan_type' => 1,
            'family_discount_condition' => 1,
            'wifi_discount_condition' => 1,
            'call_option' => 0,
        ],
        [
            'contract_line_id' => 4,
            'payment_type' => 1,
            'billing_deadline_type' => 1,
            'plan_type' => 1,
            'family_discount_condition' => 1,
            'wifi_discount_condition' => 1,
            'call_option' => 0,
        ]

    ];
    public function findByContractLineId($contract_line_id)
    {
        $keyIndex = array_search($contract_line_id, array_column($this->contractDetailList, 'contract_line_id'));
        return $this->contractDetailList[$keyIndex];
    }
}
