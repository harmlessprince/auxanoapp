<?php

namespace App\QueryFilters;

class StatusFilter extends BaseFilter
{

    protected function applyFilter($builder)
    {
        return $builder->where('status_id', request($this->filterName()));
    }
}
