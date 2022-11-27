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

        // 家族グループの作成

        // 家族１
        $familyGroup1 = FamilyGroup::factory()->create(['contract_line_id' => $contractLineIdList[0]]);

        // 家族２
        $familyGroup2 = FamilyGroup::factory()->create(['contract_line_id' => $contractLineIdList[3]]);

        // 家族３
        $familyGroup3 = FamilyGroup::factory()->create(['contract_line_id' => $contractLineIdList[5]]);

        // 契約回線に家族グループを割り当てる
        ContractLine::whereIn('id', [$contractorIdList[0], $contractorIdList[1], $contractorIdList[2]])->update(
            [
                'family_group_id' => $familyGroup1->id,
            ],
        );

        ContractLine::whereIn('id', [$contractorIdList[3], $contractorIdList[4]])->update(
            [
                'family_group_id' => $familyGroup2->id,
            ],
        );

        ContractLine::whereIn('id', [$contractorIdList[5], $contractorIdList[6], $contractorIdList[7]])->update(
            [
                'family_group_id' => $familyGroup3->id,
            ],
        );

        // 契約端末の割り当て
        $contractDeviceIdList = [];
        foreach ($contractLineIdList as $contractLineId) {
            $contractDeviceIdList[] = ContractDevice::factory()->create(['contract_line_id' => $contractLineId])->id;
        }

        ContractDevice::where('id', $contractDeviceIdList[1])->update(
            [
                'device_type' => 1
            ]
        );
    }
}
