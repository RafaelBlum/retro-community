<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->choice('servidor');
})->purpose('Display an inspiring quote')->hourly();
