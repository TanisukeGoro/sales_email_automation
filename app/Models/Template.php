<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Template extends Model
{
    protected $guarded = [
        'id',
        'user_id',
        'created_at',
        'updated_at',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function date()
    {
        return \date('Y年m月d日', \strtotime($this->created_at));
    }

    public function createTemplate($request): void
    {
        $this->user_id = Auth::id();
        $this->fill($request->all())->save();
    }

    public function scopeGetTemplate($query)
    {
        $query->where('user_id', Auth::id());

        return $query->orderBy('id', 'desc')->get();
    }

    public function scopeGetSortTemplate($query, $request)
    {
        $query->where('user_id', Auth::id());

        if (isset($request->freeword)) {
            $query->where('name', 'like', "%{$request->freeword}%");
        }

        if (isset($request->name)) {
            if ($request->name === '0') {
                $query->orderBy('name', 'asc');
            } elseif ($request->name === '1') {
                $query->orderBy('name', 'desc');
            }
        }

        if (isset($request->created_at)) {
            if ($request->created_at === '0') {
                $query->orderBy('created_at', 'asc');
            } elseif ($request->created_at === '1') {
                $query->orderBy('created_at', 'desc');
            }
        }

        return $query->get();
    }
}
