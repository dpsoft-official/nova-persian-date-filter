<?php

namespace Dpsoft\NovaPersiandateFilter;

use Illuminate\Http\Request;
use Laravel\Nova\Filters\Filter;

class PersianDateFilter extends Filter
{
    /**
     * The filter's component.
     *
     * @var string
     */
    public $component = 'persian-date-filter';

    /**
     * Apply the filter to the given query.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  mixed  $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function apply(Request $request, $query, $value)
    {
        return $query;
    }

    /**
     * Get the filter's available options.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function options(Request $request)
    {
        return [];
    }

    /**
     * Set datePicker Color. See https://talkhabi.github.io/vue-persian-datetime-picker/#/theme
     *
     * @param $color
     * @return PersianDateFilter
     */
    public function color($color)
    {
        return $this->withMeta(compact('color'));
    }

    /**
     * Set calendar type
     *
     * @param $type string date|datetime
     * @return PersianDateFilter
     */
    public function type($type)
    {
        return $this->withMeta(compact('type'));
    }
}
