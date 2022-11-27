<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContractLine extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * 契約者
     */
    public function contractor()
    {
        return $this->belongsTo(Contractor::class, 'contractor_id');
    }

    /**
     * 契約内容
     */
    public function contractDetail()
    {
        return $this->hasOne(ContractDetail::class, 'contract_detail_id');
    }

    /**
     * 毎月の支払い履歴
     */
    public function monthlyPaymentHistories()
    {
        return $this->hasMany(MonthlyPaymentHistory::class, 'contract_line_id');
    }

    /**
     * 所属している家族グループ
     */
    public function familyGroup()
    {
        return $this->belongsTo(FamilyGroup::class, 'family_group_id');
    }

    /**
     * 回線の通信履歴
     */
    public function dataCommunicationHistories()
    {
        return $this->hasMany(DataCommunicationHistory::class, 'contract_line_id');
    }

    /**
     * 回線の通信履歴
     */
    public function callHistories()
    {
        return $this->hasMany(CallHistory::class, 'contract_line_id');
    }
}
