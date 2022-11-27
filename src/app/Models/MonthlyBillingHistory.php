<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MonthlyBillingHistory extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * 契約回線
     */
    public function contractLine()
    {
        return $this->belongsTo(ContractLine::class, 'contract_line_id');
    }

    /**
     * 支払い履歴
     */
    public function monthlyPaymentHistory()
    {
        return $this->hasOne(MonthlyPaymentHistory::class, 'monthly_billing_history_id');
    }
}
