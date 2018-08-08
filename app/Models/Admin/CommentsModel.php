<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class CommentsModel extends Model
{
    //
    public $table = 'u_comments';
    public $primarykey = 'id';

    public function UsersInfo()
    {
      return $this->hasOne('App\Models\Admin\UsersModel','id','user_id');
    }

    public function GoodsInfo()
    {
      return $this->hasOne('App\Models\Admin\GoodsModel','id','goods_id');
    }
}
