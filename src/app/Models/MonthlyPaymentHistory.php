<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MonthlyPaymentHistory extends Model
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
     * 毎月の請求履歴
     */
    public function monthlyBillingHistory()
    {
        return $this->belongsTo(MonthlyBillingHistory::class, 'monthly_billing_history_id');
    }
}
