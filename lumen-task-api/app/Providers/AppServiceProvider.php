<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\ConnectionInterface;
use App\Database\Connection;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(ConnectionInterface::class, Connection::class);
    }
}