<?php

namespace App\Data;

class ProfileOptions
{
    /**
     * Industry and work type options (value + label).
     * Used for employer industry (single select) and worker work types (multi select).
     *
     * @var array<int, array{value: string, label: string}>
     */
    public const INDUSTRIES_AND_WORK_TYPES = [
        ['value' => 'moving', 'label' => 'Moving & Logistics'],
        ['value' => 'warehouse', 'label' => 'Warehouse & Distribution'],
        ['value' => 'automotive', 'label' => 'Automotive'],
        ['value' => 'events', 'label' => 'Events & Hospitality'],
        ['value' => 'retail', 'label' => 'Retail'],
        ['value' => 'manufacturing', 'label' => 'Manufacturing'],
        ['value' => 'other', 'label' => 'Other'],
        ['value' => 'driving', 'label' => 'Driving'],
        ['value' => 'cleaning', 'label' => 'Cleaning'],
        ['value' => 'labor', 'label' => 'General labor'],
    ];

    /**
     * Employer worker count options (value + label).
     *
     * @var array<int, array{value: string, label: string}>
     */
    public const WORKER_COUNTS = [
        ['value' => '1-5', 'label' => '1-5 workers'],
        ['value' => '6-15', 'label' => '6-15 workers'],
        ['value' => '16-30', 'label' => '16-30 workers'],
        ['value' => '31-50', 'label' => '31-50 workers'],
        ['value' => '50+', 'label' => '50+ workers'],
    ];

    /**
     * Worker availability options (value + label).
     *
     * @var array<int, array{value: string, label: string}>
     */
    public const AVAILABILITIES = [
        ['value' => 'weekday-mornings', 'label' => 'Weekday mornings'],
        ['value' => 'weekday-afternoons', 'label' => 'Weekday afternoons'],
        ['value' => 'weekday-evenings', 'label' => 'Weekday evenings'],
        ['value' => 'weekends', 'label' => 'Weekends anytime'],
    ];

    /**
     * Values from INDUSTRIES_AND_WORK_TYPES (single source for industry + work type options).
     *
     * @return list<string>
     */
    public static function industriesAndWorkTypeValues(): array
    {
        return array_column(self::INDUSTRIES_AND_WORK_TYPES, 'value');
    }

    /** @return list<string> */
    public static function workerCountValues(): array
    {
        return array_column(self::WORKER_COUNTS, 'value');
    }

    /** @return list<string> */
    public static function availabilityValues(): array
    {
        return array_column(self::AVAILABILITIES, 'value');
    }
}
