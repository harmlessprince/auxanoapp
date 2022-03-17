<?php

namespace App\QueryFilters;
use Illuminate\Support\Str;

abstract class BaseFilter
{

    public function handle($request, \Closure $next)
    {
        $builder = $next($request);
        if (!\request()->has($this->filterName())) {
            return $builder;
        }
        return $this->applyFilter($builder);
    }

    protected abstract function applyFilter($builder);

    protected function filterName(): string
    {
        $string = str_replace('Filter','', class_basename($this));
        return Str::snake($string);
    }
}
