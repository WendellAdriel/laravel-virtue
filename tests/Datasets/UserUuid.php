<?php

declare(strict_types=1);

namespace Tests\Datasets;

use Illuminate\Database\Eloquent\Model;
use WendellAdriel\Virtue\Models\Attributes\Database;
use WendellAdriel\Virtue\Models\Attributes\Fillable;
use WendellAdriel\Virtue\Models\Attributes\PrimaryKey;
use WendellAdriel\Virtue\Models\Concerns\Virtue;

#[Fillable([
    'uuid',
    'name',
    'email',
    'password',
])]
#[Database(table: 'users_uuid')]
#[PrimaryKey(name: 'uuid', type: 'string', incrementing: false)]
class UserUuid extends Model
{
    use Virtue;
}
