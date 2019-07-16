<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SearchIndexRequest;
use App\Http\Resources\WebsiteResource;
use App\JBE\Repositories\Search\SearchInterface;

class SearchController extends Controller
{
    /**
     * Display Website filtered by request.
     *
     * @param SearchIndexRequest $request
     * @param SearchInterface $repository
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(SearchIndexRequest $request, SearchInterface $repository)
    {

        return WebsiteResource::collection($repository->execute($request->all()));
    }

}
