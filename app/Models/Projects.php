<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    use HasFactory;

    protected $fillable = [
         'name',
         'detail',
         'totalCost',
         'deadline'
    ];
    public function employee()
    {
        return $this->belongsToMany(Employee::class,'employee_projects','project_id','employee_id');
    }
}
