<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class DepartmentEmployee extends Model
{
    use Sortable;

    public $sortable = ['id', 'name', 'description', 'created_at', 'updated_at'];
}
