<?php

namespace App\Models\Data;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Rank.
 */
class TypeDocument extends Model
{
    use HasFactory;

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
