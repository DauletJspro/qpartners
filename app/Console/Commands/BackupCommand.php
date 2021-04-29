<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Faker\Provider\File;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

class BackupCommand extends Command
{
    protected $process;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:backup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Save db automatically into to serve';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        {
            parent::__construct();

            if (file_exists('storage/backups/backup.sql')) {
                unlink('storage/backups/backup.sql');
            }

            $this->process = new Process(sprintf(
                'mysqldump -u%s -p%s %s > %s',
                config('database.connections.mysql.username'),
                config('database.connections.mysql.password'),
                config('database.connections.mysql.database'),
                storage_path('/backups/backup.sql')
            ));
        }
    }
        /**
         * Execute the console command.
         *
         * @return mixed
         */
        public function handle()
    {
        try {
            $this->process->mustRun();
            Log::info('Daily DB Backup - Success');
        } catch (ProcessFailedException $exception) {
            Log::error('Daily DB Backup - Failed');
        }
    }
}
