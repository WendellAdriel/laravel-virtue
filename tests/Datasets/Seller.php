<?php

declare(strict_types=1);

namespace Tests\Datasets;

use Illuminate\Database\Eloquent\Model;
use WendellAdriel\Virtue\Models\Attributes\Relations\HasOne;
use WendellAdriel\Virtue\Models\Attributes\Relations\HasOneThrough;
use WendellAdriel\Virtue\Models\Concerns\Virtue;

#[HasOneThrough(Manufacturer::class, Computer::class)]
#[HasOne(Computer::class)]
final class Seller extends Model
{
    use Virtue;
}
