<?php

namespace App\Models\Data;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Corps.
 */
class Corps extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'corps';

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
