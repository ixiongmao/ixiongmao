<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class AdminRecordModel extends Model
{
    //
    public $table = 'admin_records';
    public $primarykey = 'id';
    public function Admins_Record()
    {
       return $this->hasOne('App\Models\Admin\AdminModel','id');
    }
}
