<?php

namespace App\Enums;

enum UserRole: string
{
    case ADMIN = 'admin';
    case USER = 'user';
    case TRAINER = 'trainer';
    case NUTRITIONIST = 'nutritionist';
}