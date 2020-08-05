<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Approach extends Model
{
    public const PHASE = [
        1 => ['label' => 'アプローチ'],
        2 => ['label' => '商談'],
        3 => ['label' => '提案中'],
        4 => ['label' => '契約'],
        5 => ['label' => '失注'],
    ];

    public const POSSIBILITY = [
        1 => ['label' => 'A'],
        2 => ['label' => 'B'],
        3 => ['label' => 'C'],
        4 => ['label' => 'D'],
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['phase_label', 'possibility_label'];

    protected $guarded = [
        'created_at',
        'updated_at',
        'user_id',
    ];

    public function getPhaseLabelAttribute()
    {
        $phase = $this->attributes['phase'];

        if (!isset(self::PHASE[$phase])) {
            return '';
        }
        return self::PHASE[$phase]['label'];
    }

    public function getPossibilityLabelAttribute()
    {
        $possibility = $this->attributes['possibility'];

        if (!isset(self::POSSIBILITY[$possibility])) {
            return '';
        }
        return self::POSSIBILITY[$possibility]['label'];
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function company()
    {
        return $this->belongsTo('App\Models\Company');
    }

    public function approachFolder()
    {
        return $this->belongsTo('App\Models\ApproachFolder');
    }
}
