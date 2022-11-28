<?php

namespace Database\Seeders;

use App\Models\ContractDevice;
use App\Models\ContractLine;
use App\Models\Contractor;
use App\Models\FamilyGroup;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class ContractLineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 契約者の取得
        $contractorIdList = Contractor::all()->pluck('id')->toArray();

        // 回線と契約者を紐付け
        $contractLineIdList = [];
        Log::info($contractorIdList);
        foreach ($contractorIdList as $contractorId) {
            $contractLineIdList[] = ContractLine::factory()->create(['contractor_id' => $contractorId])->id;
        }
        Log::info($contractLineIdList);

        // 家族グループの作成

        // 家族１
        $familyGroup1 = FamilyGroup::factory()->create(['contract_line_id' => $contractLineIdList[0]]);

        // 家族２
        $familyGroup2 = FamilyGroup::factory()->create(['contract_line_id' => $contractLineIdList[4]]);

        // 家族３
        $familyGroup3 = FamilyGroup::factory()->create(['contract_line_id' => $contractLineIdList[6]]);

        // 契約回線に家族グループを割り当てる
        ContractLine::whereIn('id', [$contractorIdList[0], $contractorIdList[1], $contractorIdList[2]])->update(
            [
                'family_group_id' => $familyGroup1->id,
            ],
        );

        ContractLine::whereIn('id', [$contractorIdList[4], $contractorIdList[5]])->update(
            [
                'family_group_id' => $familyGroup2->id,
            ],
        );

        ContractLine::whereIn('id', [$contractorIdList[6], $contractorIdList[7]])->update(
            [
                'family_group_id' => $familyGroup3->id,
            ],
        );

        $array = [
            [
                'contractor_id' => $contractorIdList[0],
                'contract_line_ids' => [$contractLineIdList[0], $contractLineIdList[9]]
            ],
            [
                'contractor_id' => $contractorIdList[1],
                'contract_line_ids' => [$contractLineIdList[1]]
            ],
            [
                'contractor_id' => $contractorIdList[2],
                'contract_line_ids' => [$contractLineIdList[2]]
            ],
            [
                'contractor_id' => $contractorIdList[3],
                'contract_line_ids' => [$contractLineIdList[3]]
            ],
            [
                'contractor_id' => $contractorIdList[4],
                'contract_line_ids' => [$contractLineIdList[4]]
            ],
            [
                'contractor_id' => $contractorIdList[5],
                'contract_line_ids' => [$contractLineIdList[5]]
            ],
            [
                'contractor_id' => $contractorIdList[6],
                'contract_line_ids' => [$contractLineIdList[6]]
            ],
            [
                'contractor_id' => $contractorIdList[7],
                'contract_line_ids' => [$contractLineIdList[7]]
            ],
            [
                'contractor_id' => $contractorIdList[8],
                'contract_line_ids' => [$contractLineIdList[8]]
            ],
            [
                'contractor_id' => $contractorIdList[9],
                'contract_line_ids' => [$contractLineIdList[9]]
            ],
        ];


        // 契約端末の割り当て

        $contractDeviceIdList = [];
        foreach ($array as $aContractorMapppingContractLineId) {
            $contractorId = $aContractorMapppingContractLineId['contractor_id'];
            $contractLineIds = $aContractorMapppingContractLineId['contract_line_ids'];
            foreach ($contractLineIds as $contractLineId) {
                $contractDeviceIdList[] = ContractDevice::factory()->create(['contract_line_id' => $contractLineId, 'contractor_id' => $contractorId])->id;
            }
        }

        ContractDevice::where('id', $contractDeviceIdList[9])->update(
            [
                // 種別を光回線
                'device_type' => 1,

            ]
        );
    }
}
