<?php

declare(strict_types=1);

namespace Tests\Datasets;

use Illuminate\Database\Eloquent\Model;
use WendellAdriel\Virtue\Models\Attributes\Fillable;
use WendellAdriel\Virtue\Models\Attributes\PrimaryKey;
use WendellAdriel\Virtue\Models\Concerns\Virtue;

#[Fillable([
    'movie_id',
])]
#[PrimaryKey(name: 'movie_id', type: 'string', incrementing: false)]
final class Movie extends Model
{
    use Virtue;
}
