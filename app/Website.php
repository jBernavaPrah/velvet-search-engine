<?php

namespace App;

use App\Traits\FullTextSearch;
use Illuminate\Database\Eloquent\Model;


class Website extends Model
{

    protected $searchable = [
        'url' => 2,
        'title' => 1,
        'description' => 1,
        'keywords'
    ];

    use FullTextSearch;


}
