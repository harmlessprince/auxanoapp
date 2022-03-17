<?php

namespace App\Repositories\Eloquent\Repository;
use App\Models\Role;
class RoleRepository extends BaseRepository
{
    public function __construct(Role $model)
    {
        parent::__construct($model);
    }
}

