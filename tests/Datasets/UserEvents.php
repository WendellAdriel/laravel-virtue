<?php

declare(strict_types=1);

namespace Tests\Datasets;

use Illuminate\Database\Eloquent\Model;
use WendellAdriel\Virtue\Models\Attributes\Database;
use WendellAdriel\Virtue\Models\Attributes\DispatchesOn;
use WendellAdriel\Virtue\Models\Attributes\Fillable;
use WendellAdriel\Virtue\Models\Attributes\PrimaryKey;
use WendellAdriel\Virtue\Models\Concerns\Virtue;

#[Fillable([
    'id',
    'name',
    'email',
    'password',
])]
#[Database(table: 'users')]
#[PrimaryKey(incrementing: false)]
#[DispatchesOn(event: 'created', class: UserCreated::class)]
#[DispatchesOn(event: 'updated', class: UserUpdated::class)]
#[DispatchesOn(event: 'deleted', class: UserDeleted::class)]
final class UserEvents extends Model
{
    use Virtue;
}
