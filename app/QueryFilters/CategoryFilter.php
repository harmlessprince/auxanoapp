<?php

namespace App\QueryFilters;

class CategoryFilter extends BaseFilter
{
    protected function applyFilter($builder)
    {
        return $builder->where('category_id', request($this->filterName()));
    }
}
