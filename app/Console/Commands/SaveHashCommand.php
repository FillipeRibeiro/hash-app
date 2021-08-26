<?php

namespace App\Console\Commands;

use App\Models\HashInfo;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class SaveHashCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'nofaro:teste {string} {--requests=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Generate 'X' hashes and save them on the database";

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $batch = now()->format('Y-m-d H:i:s');

        $attempts = $this->option('requests');
        $textInput = $this->argument('string');

        while ($attempts > 0) {
            $hashGenerated = Http::get(route('hash.generate', $textInput));
            if (!$hashGenerated->successful()) {
                $this->error("Erro ao processar hash");
                $hashGenerated->throw();
                exit;
            }
            $hashGenerated = $hashGenerated->json();
            $hashGenerated['batch'] = $batch;
            HashInfo::insert($hashGenerated);

            $textInput = $hashGenerated['hash'];
            $attempts--;
        }

        $this->info("Commando finalizado com sucesso!");
    }
}
