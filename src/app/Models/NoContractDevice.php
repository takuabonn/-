<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NoContractDevice extends Model
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
}
