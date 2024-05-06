<?php

declare(strict_types=1);

namespace Tests\Datasets;

use WendellAdriel\Virtue\Models\Attributes\Fillable;
use WendellAdriel\Virtue\Models\Attributes\Relations\BelongsTo;

#[Fillable([
    'name',
])]
#[BelongsTo(Library::class)]
final class LibraryBook extends Book
{
}
