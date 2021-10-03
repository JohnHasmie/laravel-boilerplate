<?php

namespace App\Models\Employee;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class EmployeeGeneralEducation
 */
class EmployeeGeneralEducation extends Model
{
    use HasFactory;

    protected $table = 'employee_general_educations';

    /**
     * @var string[]
     */
    protected $guarded = [
        
    ];

    
}
