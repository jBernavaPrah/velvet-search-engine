<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SearchIndexRequest;
use App\Http\Resources\WebsiteResource;
use App\JBE\Repositories\SearchRepository;

class SearchController extends Controller
{
    /**
     * Display Website filtered by request.
     *
     * @param SearchIndexRequest $request
     * @param SearchRepository $searchRepository
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(SearchIndexRequest $request, SearchRepository $searchRepository)
    {

        return WebsiteResource::collection($searchRepository->execute($request->all()));
    }

}
