<?php

namespace App\Enums;

class UserType extends Enum
{
    const SUPER_ADMIN = 'super admin';
    const ADMIN = 'admin';
    const AGENT = 'agent';
    const TECHNICIAN = 'technician';
}
