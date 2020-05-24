<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SearchConditions extends Model
{
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function date()
    {
        return \date('Y年m月d日', \strtotime($this->created_at));
    }
}
