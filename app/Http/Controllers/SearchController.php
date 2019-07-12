<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchIndexRequest;
use App\JBE\Repositories\SearchRepository;

class SearchController extends Controller
{
    /**
     * Show all websites founded using terms.
     *
     * @param SearchIndexRequest $request
     * @param SearchRepository $repository
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(SearchIndexRequest $request, SearchRepository $repository)
    {

        $websites = $repository->execute($request->all());

        $q = $request->q;

        return view('search.index', compact('websites', 'q'));

    }

}
