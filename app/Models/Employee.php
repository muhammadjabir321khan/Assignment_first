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

    public function project()
    {
        return $this->belongsToMany(Projects::class ,'employee_projects','project_id','employee_id');
    }
    use HasFactory;
}
