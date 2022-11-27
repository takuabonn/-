<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContractDetail extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * 契約回線
     */
    public function contractLine()
    {
        return $this->belongsTo(ContractLine::class, 'contract_detail_id');
    }
}
