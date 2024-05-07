<?php

declare(strict_types=1);

use Illuminate\Support\Collection;
use Tests\Datasets\TestCommand;

it('load attributes and options correctly', function () {
    $command = resolve(TestCommand::class);
    $arguments = Collection::make($command->getArguments())->keyBy('name');
    $options = Collection::make($command->getOptions())->keyBy('name');

    expect($arguments)->toHaveCount(4)
        ->and($arguments->get('name'))->toBeArray()
        ->and($arguments->get('required'))->toBeArray()
        ->and($arguments->get('optional'))->toBeArray()
        ->and($arguments->get('optional')['description'])->toBe('Optional parameter')
        ->and($arguments->get('age'))->toBeArray()
        ->and($arguments->get('age')['default'])->toBe(18)
        ->and($options)->toHaveCount(3)
        ->and($options->get('year'))->toBeArray()
        ->and($options->get('year')['description'])->toBe('The year')
        ->and($options->get('negative'))->toBeArray()
        ->and($options->get('negative')['shortcut'])->toBe('m')
        ->and($options->get('scores'))->toBeArray()
        ->and($options->get('scores')['default'])->toBe([1, 2, 3]);
});
