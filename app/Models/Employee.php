<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{

    protected $fillable = [
        'fname',
        'lname',
        'company_id'
    ];

    public function company()
    {
        return  $this->belongsTo(Company::class);
    }

    public function projects()
    {
        return $this->belongsToMany(Project::class, 'employee_projects', 'employee_id', 'project_id');
    }

    use HasFactory;
}
