<?php

namespace App\Http\ViewComposers;

use App\Models\Sent;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Carbon;

class RemainingSendCountsComposer
{
    /**
     * @var string
     */
    protected $remaining_send_count;

    //残り送信回数
    public function __construct()
    {
        $now = Carbon::now('Asia/Tokyo');
        $sents = Sent::whereYear('created_at', $now->year)->whereMonth('created_at', $now->month)->get();

        $sent_count = 0;

        foreach ($sents as $key => $sent) {
            $sent_count += $sent->count;
        }

        $send_counts = auth()->user()->sendCounts;

        $send_count = 0;

        foreach ($send_counts as $key => $sendCount) {
            $send_count += $sendCount->count;
        }

        // 最大送信回数から送信済み回数を引いて残りの送信回数を出す。
        $remaining_send_count = $send_count - $sent_count;

        $this->remaining_send_count = $remaining_send_count;
    }

    /**
     * Bind data to the view.
     *
     * @param View $view
     */
    public function compose(View $view): void
    {
        $view->with('remaining_send_count', $this->remaining_send_count);
    }
}
