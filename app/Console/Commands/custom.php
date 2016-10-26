<?php

namespace App\Console\Commands;
use App\Employee;
use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
class custom extends Command {
    /**
     * The console command name.
     *
     * @var string
     */
    protected $signature = 'custom:employeeCount';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "custom cli commands in the application";
    /**
     * Execute the console command.
     *
     * @return void
     */
    public function fire()
    {
        $this->info('Count of the employee :'.Employee::count());
    }
    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {

    }
}