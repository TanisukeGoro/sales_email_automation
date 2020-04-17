<?php

namespace App\Http\ViewComposers;

use App\Models\Sent;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Carbon;

class SentCountsComposer
{
    /**
     * @var string
     */
    protected $sent_count;

    //送信済み回数の合計
    public function __construct()
    {
        $now = Carbon::now('Asia/Tokyo');
        $sents = Sent::whereYear('created_at', $now->year)->whereMonth('created_at', $now->month)->get();

        $count = 0;

        foreach ($sents as $key => $sent) {
            $count += $sent->count;
        }

        $this->sent_count = $count;
    }

    /**
     * Bind data to the view.
     *
     * @param View $view
     */
    public function compose(View $view): void
    {
        $view->with('sent_count', $this->sent_count);
    }
}
