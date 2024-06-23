<?php

namespace App\Traits;

use Spatie\Translatable\HasTranslations;

trait TranslatableWithJsonEscape
{
    use HasTranslations;

    /**
     * Encode the given value as JSON.
     *
     * @param mixed $value
     * @return string
     */
    protected function asJson($value): string
    {
        return json_encode($value, JSON_UNESCAPED_UNICODE);
    }
}
