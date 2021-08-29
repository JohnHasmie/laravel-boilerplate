<?php

namespace App\Models;

use App\Models\Data\Corps;
use App\Models\Data\Division;
use App\Models\Data\Position;
use App\Models\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Role.
 */
class Employee extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Uuid;

    public $incrementing = false;

    /**
     * @var string[]
     */
    protected $guarded = [
        
    ];

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::bootUuid();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function division()
    {
        return $this->belongsTo(Division::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function corps()
    {
        return $this->belongsTo(Corps::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function rank()
    {
        return $this->belongsTo(Rank::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function position()
    {
        return $this->belongsTo(Position::class);
    }

}
