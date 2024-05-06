<?php

declare(strict_types=1);

namespace Tests\Datasets;

use Illuminate\Database\Eloquent\Model;
use WendellAdriel\Virtue\Models\Attributes\Relations\MorphTo;
use WendellAdriel\Virtue\Models\Concerns\Virtue;

#[MorphTo('imageable')]
final class Image extends Model
{
    use Virtue;
}
