<?php

namespace App\Repositories\Eloquent\Repository;
use App\Models\Audit;
class AuditRepository extends BaseRepository
{
    public function __construct(Audit $model)
    {
        parent::__construct($model);
    }
}

