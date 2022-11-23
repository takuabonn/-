<?php

namespace App\infla;

use App\domains\repositories\IFContractDeviceRepository;
use Illuminate\Support\Facades\Log;

class InMemoryContractDeviceRepository implements IFContractDeviceRepository
{
    private $contractDevices = [
        [
            'id' => 1,
            'device_name' => 'iphone',
            'contractor_id' => 1,
            'contract_line_id' => 1,
            'device_type' => 0,
            'ime_number' => '1134535',
            'model_body_price' => 90000,
            'how_to_buy' => 1,
            'division_number' => 24,
            'model_price_balance' => 20000

        ],
        [
            'id' => 2,
            'device_name' => 'iphone',
            'contractor_id' => 2,
            'contract_line_id' => 2,
            'device_type' => 0,
            'ime_number' => '1134534',
            'model_body_price' => 90000,
            'how_to_buy' => 1,
            'division_number' => 24,
            'model_price_balance' => 20000

        ],
        [
            'id' => 3,
            'device_name' => 'iphone',
            'contractor_id' => 3,
            'contract_line_id' => 3,
            'device_type' => 1,
            'ime_number' => '1134533',
            'model_body_price' => 90000,
            'how_to_buy' => 1,
            'division_number' => 24,
            'model_price_balance' => 20000
        ],
        [
            'id' => 4,
            'device_name' => 'iphone',
            'contractor_id' => 4,
            'contract_line_id' => 4,
            'device_type' => 0,
            'ime_number' => '1134532',
            'model_body_price' => 90000,
            'how_to_buy' => 1,
            'division_number' => 24,
            'model_price_balance' => 20000
        ],
        [
            'id' => 5,
            'device_name' => 'iphone',
            'contractor_id' => 4,
            'contract_line_id' => 5,
            'device_type' => 1,
            'ime_number' => '1134531',
            'model_body_price' => 90000,
            'how_to_buy' => 1,
            'division_number' => 24,
            'model_price_balance' => 20000
        ],

        [
            'id' => 6,
            'device_name' => 'iphone',
            'contractor_id' => 5,
            'contract_line_id' => 6,
            'device_type' => 0,
            'ime_number' => '1134531',
            'model_body_price' => 90000,
            'how_to_buy' => 1,
            'division_number' => 24,
            'model_price_balance' => 20000
        ],

    ];

    public function getByContractorId($contractor_id)
    {
        $contractDevices = array_filter($this->contractDevices, function ($contractDevice) use ($contractor_id) {
            return $contractDevice['contractor_id'] === $contractor_id;
        });
        return array_values($contractDevices);
    }

    public function getByDeviceType($device_type)
    {
    }

    public function existsDeviceOnDeviceType($device_type, $contractor_id)
    {
        $contractDevices = array_filter($this->contractDevices, function ($contractDevice) use ($contractor_id) {
            return $contractDevice['contractor_id'] === $contractor_id;
        });

        $keyIndex = array_search($device_type, array_column(array_values($contractDevices), 'device_type'));

        return $keyIndex === false ? false : true;
    }

    public function existsFamilyDeviceOnDeviceType($device_type, $contractor_ids)
    {
        foreach ($contractor_ids as $contractor_id) {
            Log::info($contractor_id);
            if ($this->existsDeviceOnDeviceType($device_type, $contractor_id)) {
                return true;
            }
        }
        return false;
    }
}
