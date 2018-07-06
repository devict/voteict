<?php

namespace App\Filters;

use Illuminate\Http\Request;

abstract class AbstractFilters
{
    /**
     * @var Request
     */
    protected $request;

    /**
     * The Eloquent builder.
     *
     * @var \Illuminate\Database\Eloquent\Builder
     */

    protected $builder;

    /**
     * Create a new ThreadFilters instance.
     *
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Apply the filters.
     *
     * @param  Builder $builder
     * @return Builder
     */
    public function apply($builder)
    {
        $this->builder = $builder;
        foreach ($this->all() as $filter => $value) {
            if (method_exists($this, $filter)) {
                $this->{$filter}($value);
            }
        }

        return $this->builder;
    }

    /**
     * Fetch all relevant filters from the request.
     *
     * @return array
     */
    public function all()
    {
        $filters = array_pluck(
            (new \ReflectionClass($this))->getMethods(\ReflectionMethod::IS_PROTECTED),
            'name'
        );

        return array_filter($this->request->only($filters));
    }

    /**
     * Fetch a filter value.
     *
     * @return array
     */
    public function get($key, $default = null)
    {
        return array_get($this->all(), $key, $default);
    }

    /**
     * Add filters.
     *
     * @return self
     */
    public function add(array $filters)
    {
        $this->request->merge($filters);

        return $this;
    }
}
