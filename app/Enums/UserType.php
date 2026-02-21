<?php

namespace App\Enums;

enum UserType: string
{
    case Worker = 'worker';
    case Employer = 'employer';
}
