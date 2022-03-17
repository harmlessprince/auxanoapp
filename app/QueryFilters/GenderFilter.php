<?php

namespace App\QueryFilters;

use Illuminate\Http\Request;

class GenderFilter extends BaseFilter
{
    protected function applyFilter($builder)
    {
        return $builder->whereHas('gender', function ($query){
            $query->where('slug', \request($this->filterName()));
        });
    }
}
