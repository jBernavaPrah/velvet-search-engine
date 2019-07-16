<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchIndexRequest;
use App\JBE\Repositories\Search\SearchInterface;

class SearchController extends Controller
{
    /**
     * Show all websites founded using terms.
     *
     * @param SearchIndexRequest $request
     * @param SearchInterface $repository
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(SearchIndexRequest $request, SearchInterface $repository)
    {

        $websites = $repository->execute($request->all());

        $q = $request->q;

        return view('search.index', compact('websites', 'q'));

    }

}
