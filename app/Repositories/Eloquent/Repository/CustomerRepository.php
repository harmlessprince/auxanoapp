<?php

namespace App\Repositories\Eloquent\Repository;
use App\Models\Customer;
class CustomerRepository extends BaseRepository
{
    public function __construct(Customer $model)
    {
        parent::__construct($model);
    }
}

