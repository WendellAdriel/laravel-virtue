<?php

declare(strict_types=1);

namespace Tests\Datasets;

use Illuminate\Database\Eloquent\Model;
use WendellAdriel\Virtue\Models\Attributes\Cast;
use WendellAdriel\Virtue\Models\Attributes\Database;
use WendellAdriel\Virtue\Models\Attributes\Fillable;
use WendellAdriel\Virtue\Models\Attributes\Hidden;
use WendellAdriel\Virtue\Models\Concerns\Virtue;

#[Fillable([
    'name',
    'price',
    'random_number',
    'another_random_number',
    'expires_at',
])]
#[Hidden([
    'random_number',
    'another_random_number',
])]
#[Cast(field: 'price', type: 'float')]
#[Cast(field: 'random_number', type: 'int')]
#[Cast(field: 'another_random_number', type: 'int')]
#[Cast(field: 'expires_at', type: 'immutable_datetime')]
#[Database(table: 'products')]
final class ProductHidden extends Model
{
    use Virtue;
}
