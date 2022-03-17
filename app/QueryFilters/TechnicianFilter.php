<?php

namespace App\QueryFilters;

class TechnicianFilter  extends BaseFilter
{
    protected function applyFilter($builder)
    {
        return $builder->where('agent_id', request($this->filterName()));
    }
}
