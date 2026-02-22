<?php

namespace App\Enums;

use App\Services\FeatureFlagService;

enum Feature: string
{
    case DisableSignup = 'disable_signup';

    public function isEnabled(): bool
    {
        return app(FeatureFlagService::class)->isEnabled($this->value);
    }

    public function isDisabled(): bool
    {
        return ! $this->isEnabled();
    }
}
