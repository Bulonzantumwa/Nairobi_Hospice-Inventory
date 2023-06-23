<?php

namespace App\Models;

use App\Http\Controllers\HOD\ClinicalInventoryController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Condition extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    public function clinicalInventory(): HasMany
    {
        return $this->hasMany(ClinicalInventoryController::class);
    }
}
