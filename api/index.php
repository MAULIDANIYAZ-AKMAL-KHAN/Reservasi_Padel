<?php

// Arahkan path storage Laravel ke /tmp agar bisa ditulis di Vercel serverless
$_ENV['APP_STORAGE'] = '/tmp';
putenv('APP_STORAGE=/tmp');

if (!is_dir('/tmp/storage')) {
    mkdir('/tmp/storage', 0777, true);
    mkdir('/tmp/storage/framework', 0777, true);
    mkdir('/tmp/storage/framework/views', 0777, true);
    mkdir('/tmp/storage/framework/cache', 0777, true);
    mkdir('/tmp/storage/framework/sessions', 0777, true);
    mkdir('/tmp/storage/logs', 0777, true);
}

// Forward Vercel requests to Laravel's index.php
require __DIR__ . '/../public/index.php';