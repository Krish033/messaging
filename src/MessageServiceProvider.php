<?php

namespace Krish033\Netty;

use Illuminate\Support\ServiceProvider;
use Krish033\Netty\Contracts\Auth;
use Krish033\Netty\Repositories\AuthRepository;
use Krish033\Netty\Contracts\Message;
use Krish033\Netty\Repositories\MessageRepository;

class MessageServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {

        $this->mergeConfigFrom(__DIR__ . '/../config/netty.php', 'netty');

        $this->app->singleton(Message::class, function ($app) {
            return new MessageRepository(config('netty'));
        });


        $this->app->alias(Message::class, 'netty');
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {


        if ($this->app->runningInConsole()) {
            $this->commands([
                \Krish033\Netty\Console\MessageCommand::class,
            ]);
        }

        $this->publishes([
            __DIR__ . '/../config/netty.php' => config_path('netty.php'),
        ], 'Netty');
    }
}
