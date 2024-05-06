<?php

declare(strict_types=1);

namespace Tests\Datasets;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;
use WendellAdriel\Virtue\Models\Attributes\Fillable;
use WendellAdriel\Virtue\Models\Attributes\PrimaryKey;
use WendellAdriel\Virtue\Models\Concerns\Virtue;

#[Fillable([
    'id',
])]
#[PrimaryKey(type: 'string', incrementing: false)]
final class Crew extends Model
{
    use HasUlids;
    use Virtue;
}
