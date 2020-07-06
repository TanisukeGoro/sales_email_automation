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
        $sent_count = Sent::whereYear('created_at', $now->year)->whereMonth('created_at', $now->month)->count();

        if (auth()->user()->plan_id !== null) {
            $send_limit_count = auth()->user()->plan->send_limit;

            // 最大送信回数から送信済み回数を引いて残りの送信回数を出す。
            $remaining_send_count = $send_limit_count - $sent_count;

            $this->remaining_send_count = $remaining_send_count;
        } else {
            $this->remaining_send_count = 0;
        }
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
