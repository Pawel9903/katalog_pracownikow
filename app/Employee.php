<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    //
    protected $fillable = [
        'id',
        'name',
        'surname',
        'phone',
        'email',
        'description',
        'imgUrl'
    ];

    public function departments()
    {
        return $this->belongsToMany('App\Department')->withTimestamps();
    }
}