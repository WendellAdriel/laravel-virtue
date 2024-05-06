<?php

declare(strict_types=1);

namespace Tests\Datasets;

use Illuminate\Database\Eloquent\Model;
use WendellAdriel\Virtue\Models\Attributes\Database;
use WendellAdriel\Virtue\Models\Attributes\Fillable;
use WendellAdriel\Virtue\Models\Concerns\Virtue;

#[Fillable([
    'name',
    'email',
])]
#[Database(table: 'users_guarded')]
class UserGuarded extends Model
{
    use Virtue;
}
