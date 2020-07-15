<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SaleList extends Model
{
    protected $fillable = ['user_id', 'name', 'freeword', 'company_large_category_id', 'company_middle_category_id', 'listing_stock_id', 'address'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function date()
    {
        return \date('Y年m月d日', \strtotime($this->created_at));
    }
}