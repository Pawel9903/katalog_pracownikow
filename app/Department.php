<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Department extends Model
{

    use Sortable;

    public $sortable = ['id', 'name', 'description', 'created_at', 'updated_at'];

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
