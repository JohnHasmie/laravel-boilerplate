<?php

namespace App\Models\Data;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Position.
 */
class Position extends Model
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
}
