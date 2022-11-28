<?php

namespace App\infla;

use App\domains\repositories\IFContractDeviceRepository;
use App\Models\ContractDevice;

class ContractDeviceRepository implements IFContractDeviceRepository
{
    public function getByContractorId($contractor_id)
    {
    }

    public function getByDeviceType($device_type)
    {
    }

    public function existsDeviceOnDeviceType($device_type, $contractor_id)
    {
        $devices = ContractDevice::where('contractor_id', $contractor_id)->where('device_type', $device_type)->get()->toArray();

        return count($devices) > 0;
    }

    public function existsFamilyDeviceOnDeviceType($device_type, $contractor_ids)
    {
        foreach ($contractor_ids as $contractor_id) {
            if ($this->existsDeviceOnDeviceType($device_type, $contractor_id)) {
                return true;
            }
        }
        return false;
    }
}
