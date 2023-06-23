<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RequisitionItem extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    public function requisitionForm()
    {
        return $this->belongsTo(RequisitionForm::class);
    }
}
