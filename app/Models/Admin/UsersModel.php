<?php

namespace App\Models\Admin;
//App\Models\Admin\UsersModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class UsersModel extends Model
{
    //
    use SoftDeletes;
    public $table = 'users';
    public $primarykey = 'id';
}
