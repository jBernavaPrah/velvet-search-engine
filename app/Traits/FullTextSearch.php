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
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param array|mixed $terms
     * @return \Illuminate\Database\Eloquent\Builder|Builder
     */
    public function scopeSearchFullText($query, $terms)
    {

        $terms = $this->fullTextWildcards($terms);

        $columns = collect($this->searchable)->mapWithKeys(function ($item, $key) {
            return [is_numeric($key) ? $item : $key => is_numeric($key) ? 1 : $item];
        })->each(function ($priority, $column) use ($query, $terms) {

            $as = "relevance_{$column}";
            $query->selectRaw("MATCH ($column) AGAINST ( ? IN BOOLEAN MODE) as $as", [$terms])
                ->orderByRaw("$as*$priority DESC");
        });

        return $query->whereRaw("MATCH ({$columns->keys()->implode(',')}) AGAINST ( ? IN BOOLEAN MODE)", $terms);


    }
}
