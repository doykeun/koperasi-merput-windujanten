<?php

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use App\Models\User;

$user = User::where('is_admin', true)->first();
if (!$user) {
    $user = User::create([
        'name' => 'Admin',
        'email' => 'admin@koperasi-merah-putih.com',
        'password' => bcrypt('password'),
        'is_admin' => true,
    ]);
    echo 'User admin created! Email: admin@koperasi-merah-putih.com, Password: password' . PHP_EOL;
} else {
    echo 'User admin already exists! Email: ' . $user->email . PHP_EOL;
}
