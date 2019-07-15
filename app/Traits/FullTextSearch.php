<?php


namespace App\Traits;


use Illuminate\Database\Query\Builder;

/**
 * Trait for do full search on MYSQL database. Adds a `searchFullText()` scope method to the class.
 *
 * This trait should only be applied to classes that have $searchable array set
 * and database column are correctly indexed.
 *
 * To create correct index, see https://dev.mysql.com/doc/refman/8.0/en/fulltext-search.html
 *
 */
trait FullTextSearch
{


    /**
     * Replaces spaces with full text search wildcards
     *
     * @param string $term
     * @return string
     * @author https://arianacosta.com/php/laravel/tutorial-full-text-search-laravel-5/
     */
    protected function fullTextWildcards($term)
    {
        // removing symbols used by MySQL
        $reservedSymbols = ['-', '+', '<', '>', '@', '(', ')', '~'];
        $term = str_replace($reservedSymbols, '', $term);

        $words = explode(' ', $term);

        foreach ($words as $key => $word) {
            /*
             * applying + operator (required word) only big words
             * because smaller ones are not indexed by mysql
             */
            if (strlen($word) >= 3) {
                $words[$key] = '+' . $word . '*';
            }
        }

        $searchTerm = implode(' ', $words);

        return $searchTerm;
    }

    /**
     *
     * Scope of model to permit full-text search over mysql indexes.
     *
     * Require a $searchable array already set in model.
     * $searchable = [
     *      'column_name'     => (int) Priority of that column over all query.
     *      'other_column' // default set priority to 1
     *    ]
     *
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param array|mixed $terms
     * @return \Illuminate\Database\Eloquent\Builder|Builder
     */
    public function scopeSearchFullText($query, $terms)
    {

        $terms = $this->fullTextWildcards($terms);

        $columns = collect($this->searchable)->mapWithKeys(function ($item, $key) {
            // Map correctly columns with priorities.
            // If priority is not given, set default to 1.
            return [is_numeric($key) ? $item : $key => is_numeric($key) ? 1 : $item];
        })->each(function ($priority, $column) use ($query, $terms) {
            // For each column create a add new raw select
            $as = "relevance_{$column}";
            $query->selectRaw("MATCH ($column) AGAINST ( ? IN BOOLEAN MODE) as $as", [$terms])
                ->orderByRaw("$as*$priority DESC");
        });

        // then add a where to filter only rows that match search.
        return $query->whereRaw("MATCH ({$columns->keys()->implode(',')}) AGAINST ( ? IN BOOLEAN MODE)", $terms);


    }
}
