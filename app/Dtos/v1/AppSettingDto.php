<?php

namespace App\Dtos\v1;

use App\Traits\HasTimestamps;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;

class AppSettingDto extends Data
{
    use HasTimestamps;

    public function __construct(
        #[MapInputName('office_name')]
        public ?string $officeName,

        #[MapInputName('app_name')]
        public ?string $appName,

        #[MapInputName('active_plate_format_id')]
        public ?int $activePlateFormatId,
    ) {}
}
