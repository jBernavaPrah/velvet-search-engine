<?php


namespace App\JBE\Repositories\Search;


interface SearchInterface
{
    /**
     * Entry point for repository
     * @param array $data
     * @return mixed
     */
    public function execute(array $data);
}
