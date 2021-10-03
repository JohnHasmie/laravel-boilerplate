<?php

namespace App\Models\Employee;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class EmployeeMilitaryEducation
 */
class EmployeeMilitaryEducation extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'employee_military_educations';

    /**
     * @var string[]
     */
    protected $guarded = [
        
    ];

    
}
