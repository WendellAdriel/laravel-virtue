<?php

declare(strict_types=1);

namespace Tests\Datasets;

use Illuminate\Console\Command;
use WendellAdriel\Virtue\Commands\Attributes\FlagOption;
use WendellAdriel\Virtue\Commands\Attributes\OptionalArgument;
use WendellAdriel\Virtue\Commands\Attributes\RequiredArgument;
use WendellAdriel\Virtue\Commands\Attributes\ValueOption;
use WendellAdriel\Virtue\Commands\Concerns\Virtue;

#[RequiredArgument(name: 'name')]
#[OptionalArgument(name: 'age', default: 18)]
#[FlagOption(name: 'negative', shortcut: 'm', negatable: true)]
#[ValueOption(name: 'year', description: 'The year')]
#[ValueOption(name: 'scores', array: true, default: [1, 2, 3])]
class TestCommand extends Command
{
    use Virtue;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $name = 'app:test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
    }
}
