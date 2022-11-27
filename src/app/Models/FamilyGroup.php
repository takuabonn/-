<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FamilyGroup extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * 家族グループに所属している回線
     */
    public function contractLines()
    {
        return $this->hasMany(ContractLine::class, 'family_group_id');
    }
}
