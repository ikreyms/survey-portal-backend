<?php

namespace App\Traits;

use Spatie\LaravelData\Attributes\MapInputName;

trait HasTimestamps
{
    #[MapInputName('created_at')]
    public ?string $createdAt;

    #[MapInputName('updated_at')]
    public ?string $updatedAt;
}