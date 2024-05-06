<?php

declare(strict_types=1);

namespace Tests\Datasets;

use Illuminate\Database\Eloquent\Model;
use WendellAdriel\Virtue\Models\Attributes\Cast;
use WendellAdriel\Virtue\Models\Attributes\Database;
use WendellAdriel\Virtue\Models\Attributes\Fillable;
use WendellAdriel\Virtue\Models\Concerns\Virtue;

#[Fillable([
    'name',
    'price',
    'random_number',
    'expires_at',
])]
#[Cast(field: 'price', type: 'float')]
#[Cast(field: 'random_number', type: 'int')]
#[Cast(field: 'expires_at', type: 'immutable_datetime')]
#[Database(table: 'products')]
class ProductFillable extends Model
{
    use Virtue;
}
