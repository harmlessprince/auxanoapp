<?php

namespace App\Repositories\Eloquent\Repository;
use App\Models\Permission;
class PermissionRepository extends BaseRepository
{
    public function __construct(Permission $model)
    {
        parent::__construct($model);
    }
}

