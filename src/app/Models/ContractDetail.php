<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContractDetail extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function contractLine()
    {
        return $this->hasOne(ContractLine::class, 'contract_detail_id');
    }
}
