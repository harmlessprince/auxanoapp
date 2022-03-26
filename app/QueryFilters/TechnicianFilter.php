<?php

namespace App\QueryFilters;

class TechnicianFilter  extends BaseFilter
{
    protected function applyFilter($builder)
    {
        return $builder->where('technician_id', request($this->filterName()));
    }
}
