<?php

namespace App\domains\repositories;

interface IFContractDeviceRepository
{
    public function getByContractorId($contractor_id);

    public function getByDeviceType($device_type);

    public function existsDeviceOnDeviceType($device_type, $contractor_id);

    public function existsFamilyDeviceOnDeviceType($device_type, $contractor_ids);
}
