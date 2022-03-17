<?php

namespace App\QueryFilters;

class PriorityFilter extends BaseFilter
{

    protected function applyFilter($builder)
    {
        return $builder->where('priority_id', request($this->filterName()));
    }
}