<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Event;
use Tests\Datasets\UserCreated;
use Tests\Datasets\UserDeleted;
use Tests\Datasets\UserEvents;
use Tests\Datasets\UserUpdated;

it('dispatches events', function () {
    Event::fake();

    $user = UserEvents::create([
        'id' => 10,
        'name' => fake()->name,
        'email' => fake()->unique()->safeEmail,
        'password' => 's3Cr3t@!!!',
    ]);
    Event::assertDispatched(UserCreated::class);

    $user->name = fake()->name;
    $user->save();
    Event::assertDispatched(UserUpdated::class);

    $user->delete();
    Event::assertDispatched(UserDeleted::class);
});
