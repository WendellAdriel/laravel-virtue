<?php

declare(strict_types=1);

namespace Tests\Datasets;

use Illuminate\Database\Eloquent\Model;
use WendellAdriel\Virtue\Models\Attributes\Database;
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
final class UserCustom extends Model
{
    use Virtue;
}
