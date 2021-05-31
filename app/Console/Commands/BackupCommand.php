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

            $result = $this->process = new Process(sprintf(
                'mysqldump -u%s -p%s %s > %s',
                $DB_USERNAME = 'amin',
                $DB_PASSWORD = '351_087_star_coffee',
                $DB_DATABASE = 'qpartners',
                $path = '/var/www/dumps/backup.sql'
            ));
            if ($result){
                //chmod('storage', 0777);
                shell_exec('chmod -R 777 storage');
            }
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
