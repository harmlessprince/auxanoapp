<?php

namespace App\QueryFilters;

class AgentFilter  extends BaseFilter
{
    protected function applyFilter($builder)
    {
        return $builder->where('agent_id', request($this->filterName()));
    }
}
