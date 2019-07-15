<?php

namespace App;

use App\Traits\FullTextSearch;
use Illuminate\Database\Eloquent\Model;


class Website extends Model
{
    /**
     * @var array see \Traits\FullTextSearch
     */
    protected $searchable = [
        'url' => 2,
        'title' => 1,
        'description' => 1,
        'keywords'
    ];

    /**
     * Add the full test search capacity for that model.
     */
    use FullTextSearch;


}
