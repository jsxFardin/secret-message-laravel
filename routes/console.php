<?php

use App\Models\Message;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();


Artisan::command('messages:delete-read', function () {
    Message::whereNotNull('read_at')->where('read_at', '<', now()->subHour())->delete();
    $this->info('Read messages older than one hour deleted successfully.');
})->purpose('Delete read messages older than one hour')->hourly();
