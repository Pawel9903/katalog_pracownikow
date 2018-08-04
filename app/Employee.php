<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Employee extends Model
{

    use Sortable;

    public $sortable = ['id', 'name', 'surname', 'email', 'description','phone', 'created_at', 'updated_at'];

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
