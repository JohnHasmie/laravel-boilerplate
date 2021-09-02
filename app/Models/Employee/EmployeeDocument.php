<?php

namespace App\Models\Employee;

use App\Models\Data\TypeDocument;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class EmployeeDocument
 */
class EmployeeDocument extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * @var string[]
     */
    protected $guarded = [
        
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function type_document()
    {
        return $this->belongsTo(TypeDocument::class);
    }

    
}
