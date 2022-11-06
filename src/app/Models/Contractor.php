<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contractor extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function contractLines()
    {
        return $this->hasMany(ContractLine::class, 'contractor_id');
    }
}
