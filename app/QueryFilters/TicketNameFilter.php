<?php

namespace App\QueryFilters;

class TicketNameFilter extends BaseFilter
{

    protected function applyFilter($builder)
    {
        return $builder->where('subject', 'like', '%' . request($this->filterName()) . '%');
    }
}
