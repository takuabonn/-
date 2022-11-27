<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contractor extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * 契約回線
     */
    public function contractLines()
    {
        return $this->hasMany(ContractLine::class, 'contractor_id');
    }

    /**
     * 回線契約なし端末
     */
    public function noContractDevices()
    {
        return $this->hasMany(NoContractDevice::class, 'contractor_id');
    }
}
