<?php

namespace App\Traits\Query;

use Laravel\Scout\Searchable as ScoutSearchable;

trait Searchable
{
    // rename laravel scout search method.
    use ScoutSearchable {
        search as mainSearch;
    }

    /**
     * Search by term, and transform a scout build, in to a query builder.
     *
     * @param  string $term
     * @param  string $field
     * @param  mixed  $callback
     * @param  array  $keys
     *
     * @return QueryBuilder
     */
    public static function search($term, $field = 'id', $callback = null, $keys = [])
    {
        foreach (static::mainSearch($term, $callback)->get() as $k => $row) {
            $keys[] = $row->id;
        }

        $searchQuery = static::whereIn($field, $keys);

        if (env('DB_CONNECTION') == 'sqlite') {
            return $searchQuery;
        }

        return $searchQuery->orderByRaw(sprintf('FIELD (%s, %s)', $field, implode(', ', $keys)));
    }
}
