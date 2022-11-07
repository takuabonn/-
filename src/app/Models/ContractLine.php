<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContractLine extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function contractor()
    {
        return $this->belongsTo(Contractor::class, 'contractor_id');
    }

}
