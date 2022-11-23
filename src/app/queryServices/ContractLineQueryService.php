<?php

namespace App\queryServices;

use App\domains\repositories\IFContractDetailRepository;
use App\domains\repositories\IFContractDeviceRepository;
use App\domains\repositories\IFContractLineRepository;
use App\domains\repositories\IFContractorRepository;
use Illuminate\Support\Facades\Log;

class ContractLineQueryService
{
    private $contractorRepository;
    private $contractLineRepository;
    private $contractDeviceRepository;
    private $contractDetailRepository;

    public function __construct(
        IFContractorRepository $contractorRepository,
        IFContractLineRepository $contractLineRepository,
        IFContractDeviceRepository $contractDeviceRepository,
        IFContractDetailRepository $contractDetailRepository

    ) {
        $this->contractorRepository = $contractorRepository;
        $this->contractLineRepository = $contractLineRepository;
        $this->contractDeviceRepository = $contractDeviceRepository;
        $this->contractDetailRepository = $contractDetailRepository;
    }

    /**
     * @param int $phone_number 代表回線の電話番号
     * 
     * @return array $contractLine 家族の回線
     */
    public function familyContractLines($phone_number)
    {
        $contractLine = $this->contractLineRepository->findByPhoneNumber($phone_number);
        if ($contractLine['family_group_id'] === null) {
            return [];
        }
        Log::info($this->contractLineRepository->getByFamilyGroupId($contractLine['family_group_id']));
        return $this->contractLineRepository->getByFamilyGroupId($contractLine['family_group_id']);
    }

    /**
     * 光契約があるか
     * 
     * @param int $phone_number 契約者の電話番号
     * 
     */
    public function existsWifiContractInFamilyGroup($phone_number)
    {
        $contractLine = $this->contractLineRepository->findByPhoneNumber($phone_number);
        if ($contractLine['family_group_id'] === null) {
            // 回線の所有者が光を契約しているか
            return $this->contractDeviceRepository->existsDeviceOnDeviceType(1, $contractLine['contractor_id']);
        }
        // 回線の所有者とその家族グループ内で光を契約しているか
        $familyList = $this->contractorRepository->getByFamilyGroupId($contractLine['family_group_id']);
        $contractor_ids = array_column($familyList, 'id');
        Log::info($contractor_ids);
        return $this->contractDeviceRepository->existsFamilyDeviceOnDeviceType(1, $contractor_ids);
    }

    /**
     * 契約内容の取得
     */
    public function contractDetail($phone_number)
    {
        $contractLine = $this->contractLineRepository->findByPhoneNumber($phone_number);
        return $this->contractDetailRepository->findByContractLineId($contractLine['id']);
    }
}
