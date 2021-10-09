<?php

namespace App\Models\Data;

use App\Models\Employee\EmployeeUnitDetail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Rank.
 */
class Rank extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * @var string[]
     */
    protected $guarded = [
        
    ];

    public function scopeSearch($query, $term)
    {
        return $query->where(
            fn ($query) => $query->where('name', 'like', '%'.$term.'%')
                ->orWhere('label', 'like', '%'.$term.'%')
        );
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function unit_details()
    {
        return $this->hasMany(EmployeeUnitDetail::class);
    }
}
