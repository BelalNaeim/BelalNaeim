<?php

namespace App\Models;

use Spatie\MediaLibrary\MediaCollections\Models\Media as BaseMedia;

/**
 * Extend spatie media model
 */
class Media extends BaseMedia
{
    protected $hidden = [
        'disk', 'conversions_disk', 'custom_properties', 'manipulations',
        'responsive_images', 'collection_name', 'model_type', 'model_id',
        'generated_conversions', 'order_column', 'updated_at', 'created_at',
//        'uuid', 'id',
    ];

    protected $appends = [
        'responsive_urls', 'url', // 'large', 'medium', 'small', 'collection',
    ];

    protected $casts = [
        'manipulations' => 'array',
        'custom_properties' => 'array',
        'generated_conversions' => 'array',
        'responsive_images' => 'array',
        'size' => 'int',
    ];

    public function getCollectionAttribute()
    {
        return $this->collection_name;
    }

    public function getUrlAttribute(): string
    {
        if ($this->disk === 's3') {
            return $this->getTemporaryUrl(now()->addMinutes(20));
        } else {
            return $this->getFullUrl();
        }
    }

    public function getSmallAttribute()
    {
        return $this->getConversionUrl('small');
    }

    public function getConversionUrl(string $conversion, $fallbackConversion = null)
    {
        $isConversionGenerated = $this->hasGeneratedConversion($conversion);

        if (!$isConversionGenerated) {
            $conversion = $fallbackConversion;
        }

        if ($conversion == null || !$this->hasGeneratedConversion($conversion)) {
            return $this->url;
        }

        if ($this->conversions_disk === 's3') {
            return $this->getTemporaryUrl(now()->addMinutes(20), $conversion);
        }

        return $this->getFullUrl($conversion);
    }

    public function getMediumAttribute()
    {
        return $this->getConversionUrl('medium', 'small');
    }

    public function getLargeAttribute()
    {
        return $this->getConversionUrl('large', 'small');
    }

    public function getResponsiveUrlsAttribute(): array
    {
        return parent::getResponsiveImageUrls('');
    }
}
