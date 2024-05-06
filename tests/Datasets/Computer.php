<?php

declare(strict_types=1);

namespace Tests\Datasets;

use Illuminate\Database\Eloquent\Model;
use WendellAdriel\Virtue\Models\Attributes\Relations\HasOne;
use WendellAdriel\Virtue\Models\Concerns\Virtue;

#[HasOne(Manufacturer::class)]
final class Computer extends Model
{
    use Virtue;
}
