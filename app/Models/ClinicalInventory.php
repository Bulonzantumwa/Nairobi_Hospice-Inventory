<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use SebastianBergmann\LinesOfCode\Counter;

class ClinicalInventory extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    public function condition(): BelongsTo
    {
        return $this->belongsTo(Condition::class, 'condition_id');
    }

    public function utility():BelongsTo
    {
        return $this->belongsTo(Utility::class, 'utility_id');
    }

    public function location():BelongsTo
    {
        return  $this->belongsTo(Location::class, 'location_id');
    }
}
