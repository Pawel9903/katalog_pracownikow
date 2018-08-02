<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    //
    protected $fillable = [
        'name',
        'surname',
        'phone',
        'email',
        'description',
    ];

    public function departments()
    {
        return $this->belongsToMany('App\Department')->withTimestamps();
    }
}
