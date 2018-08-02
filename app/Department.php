<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    //
    public function Employees()
    {
        return $this->belongsToMany('App\Employee')->withTimestamps();
    }
}
