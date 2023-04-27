<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{


    protected $fillable = [
        'name',
        'email',
        'logo'
    ];

    public function  employee()
    {
        return  $this->hasMany(Employee::class);
    }

    use HasFactory;
}
