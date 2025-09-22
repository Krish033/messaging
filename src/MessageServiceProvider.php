<?php

namespace Krish033\Messaging;

use Illuminate\Support\ServiceProvider;
use Krish033\Messaging\Contracts\Auth;
use Krish033\Messaging\Repositories\AuthRepository;
use Krish033\Messaging\Contracts\Message;
use Krish033\Messaging\Repositories\MessageRepository;

class MessageServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {

        $this->mergeConfigFrom(__DIR__ . '/../config/messaging.php', 'messaging');

        $this->app->singleton(Message::class, function ($app) {
            return new MessageRepository(config('messaging'));
        });


        $this->app->alias(Message::class, 'messaging');
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {


        if ($this->app->runningInConsole()) {
            $this->commands([
                \Krish033\Messaging\Console\MessageCommand::class,
            ]);
        }

        $this->publishes([
            __DIR__ . '/../config/messaging.php' => config_path('messaging.php'),
        ], 'messaging');
    }
}
