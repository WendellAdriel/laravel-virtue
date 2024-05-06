<?php

declare(strict_types=1);

namespace Tests\Datasets;

use Illuminate\Database\Eloquent\Model;
use WendellAdriel\Virtue\Models\Attributes\Fillable;
use WendellAdriel\Virtue\Models\Attributes\Relations\BelongsTo;
use WendellAdriel\Virtue\Models\Concerns\Virtue;

#[Fillable([
    'price',
])]
#[BelongsTo(Book::class, null, 'custom_id', 'id')]
final class Price extends Model
{
    use Virtue;
}
