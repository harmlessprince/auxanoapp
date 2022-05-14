<?php

namespace App\QueryFilters;

class CreatedAtFilter extends BaseFilter
{
    protected function applyFilter($builder)
    {
        return $builder->where('created_at', request($this->filterName()));
    }
}
