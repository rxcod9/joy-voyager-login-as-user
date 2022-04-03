<?php

namespace Joy\VoyagerLoginAsUser\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

class LoginAsUser extends Command
{
    protected $name = 'joy-login-as-user';

    protected $description = 'Joy Voyager LoginAsUserer';

    public function handle()
    {
        $this->output->title('Starting login-as-user');

        // Your magic here

        $this->output->success('LoginAsUser successful');
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [
            ['arguement1', InputArgument::REQUIRED, 'The argument1 description'],
        ];
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [
            [
                'option1',
                'o',
                InputOption::VALUE_OPTIONAL,
                'The option1 description',
                config('joy-voyager-login-as-user.option1')
            ],
        ];
    }
}
