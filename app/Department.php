<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = [
        'id',
        'name',
        'description'
    ];
    //
    public function Employees()
    {
        return $this->belongsToMany('App\Employee')->withTimestamps();
    }
}