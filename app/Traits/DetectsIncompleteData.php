<?php

namespace App\Traits;

trait DetectsIncompleteData
{
    /**
     * @param array $data
     * @return array
    */
    public function detectCompletion(array $data): array
    {
        $normalized = collect($data)->map(function ($value){
            return $this->normalizeFieldValue($value);
        });

        $filled = $normalized->filter(function ($value){
            return !is_null($value) && $value !== '';
        });

        dd($filled->count() > 0 && $filled->count() < count($data),
            $filled->count(),
            $filled->count() > 0,
            $filled->count() < count($data),
            count($data),
            $filled->count(),


        );

        return [
            'filled' => $filled->count(),
            'total' => count($data),
            'empty' => $filled->isEmpty(),
            'partial' => $filled->count() > 0 && $filled->count() < count($data),
            'complete' => $filled->count() === count($data) && count($data) > 0,
            'missing' => $normalized->filter(fn($value) => is_null($value) || $value === '')->keys()->toArray(),
        ];
    }


    protected function normalizeFieldValue($value)
    {
        if(is_string($value) && trim(strip_tags($value)) === '')
        {
            return null;
        }

        if(is_array($value) && empty($value))
        {
            return null;
        }

        if($value === '' || $value === 'null')
        {
            return null;
        }

        if (is_string($value) && str_contains($value, 'default-campaign.jpg')) {
            return null;
        }

        return $value;
    }
}
