<?php


namespace App\JBE\Repositories\Search;

use App\Website;
use Illuminate\Support\Collection;

class SearchRepository implements SearchInterface
{

    /**
     * Return paginated website founded in bases of terms in 'query'.
     * Will be used the full search index of MySql
     *
     * @param array $params Array containing the necessary params.
     *    $params = [
     *      'q'     => (string) Query to search. Required.
     *      'limit' => (int) Return subset of total. Default: 10.
     *    ]
     * @return Collection of Website matched.
     */

    public function execute(array $params)
    {

        $data = collect($params);

        return Website::select('*')->searchFullText($data->get('q'))
            ->paginate($data->get('limit', 5))->appends(['q' => $data->get('q')]);

    }
}
