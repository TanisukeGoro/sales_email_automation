@component('mail::message')
{{-- Greeting --}}
@if (! empty($greeting))
# {{ $greeting }}
@else
@if ($level === 'error')
# @lang('エラー!')
@else
# @lang('ようこそ!')
@endif
@endif

{{-- Intro Lines --}}
メールアドレスを確認するために下のリンクをクリックしてください

{{-- Action Button --}}
@isset($actionText)
<?php
    switch ($level) {
        case 'success':
        case 'error':
            $color = $level;
            break;
        default:
            $color = 'primary';
    }
?>
@component('mail::button', ['url' => $actionUrl, 'color' => $color])
メール認証
@endcomponent
@endisset

{{-- Outro Lines --}}
心当たりがない場合は、本メッセージは破棄してください。

{{-- Salutation --}}
@if (! empty($salutation))
{{ $salutation }}
@else
{{ config('app.name') }}
@endif

{{-- Subcopy --}}
@isset($actionText)
@slot('subcopy')
@lang(
"メールアドレスの確認ボタンをクリックできない場合は、以下のURLをコピーしてブラウザに貼り付けてください。",
[
'actionText' => $actionText,
]
) <span class="break-all">[{{ $displayableActionUrl }}]({{ $actionUrl }})</span>
@endslot
@endisset
@endcomponent
