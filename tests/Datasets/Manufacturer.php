<?php

declare(strict_types=1);

namespace Tests\Datasets;

use Illuminate\Database\Eloquent\Model;
use WendellAdriel\Virtue\Models\Concerns\Virtue;

final class Manufacturer extends Model
{
    use Virtue;
}
