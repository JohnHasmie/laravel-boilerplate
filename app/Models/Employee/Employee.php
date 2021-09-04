<?php

namespace App\Models\Employee;

use App\Domains\Auth\Models\User;
use App\Models\Data\Division;
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

    public $uuidName = 'id';

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
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function unit_detail()
    {
        return $this->hasOne(EmployeeUnitDetail::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function documents()
    {
        return $this->hasMany(EmployeeDocument::class);
    }

    public function scopeSearch($query, $term)
    {
        return $query->where(
            fn ($query) => $query->where('name', 'like', '%'.$term.'%')
                ->orWhere('couple_name', 'like', '%'.$term.'%')
        );
    }

}
