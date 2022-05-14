<?php

namespace App\QueryFilters;

class DueAtFilter extends BaseFilter
{
    protected function applyFilter($builder)
    {
        return $builder->where('due_at', request($this->filterName()));
    }
}
