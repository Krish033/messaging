<?php

namespace Krish033\Netty\Console;

use Illuminate\Console\GeneratorCommand;

class MessageCommand extends GeneratorCommand
{
    /*
    |--------------------------------------------------------------------------
    | Command Name
    |--------------------------------------------------------------------------
    |
    | This is the name of the Artisan command that will be registered
    | within your application. Developers will use this name to run
    | the command in the terminal.
    |
    | Example: php artisan Netty:make WelcomeTemplate
    |
    */
    protected $name = 'Netty:make';

    /*
    |--------------------------------------------------------------------------
    | Command Description
    |--------------------------------------------------------------------------
    |
    | The description of the command that will be displayed when running
    | "php artisan list". This helps developers understand the purpose
    | of the command in a human-readable way.
    |
    */
    protected $description = 'Create a new Netty message template';

    /*
    |--------------------------------------------------------------------------
    | File Type
    |--------------------------------------------------------------------------
    |
    | This property defines the "type" of class being generated. It is
    | mainly used in console output to describe the file created by
    | this command (for example: "Template created successfully.").
    |
    */
    protected $type = 'Template';

    /*
    |--------------------------------------------------------------------------
    | Stub File
    |--------------------------------------------------------------------------
    |
    | This method tells Laravel which stub (template file) should be used
    | as the blueprint when generating a new class. The stub file lives
    | inside your package and contains the skeleton of the template.
    |
    */
    protected function getStub()
    {
        return __DIR__ . '/stubs/message.stub';
    }

    /*
    |--------------------------------------------------------------------------
    | Default Namespace
    |--------------------------------------------------------------------------
    |
    | This method determines the namespace into which the new class will
    | be generated. By default, templates will live inside the user's
    | "App\Netty\Templates" namespace unless customized.
    |
    */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . '\Netty\Templates';
    }
}
