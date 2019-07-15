<?php


namespace App\JBE\Repositories;


interface RepositoryInterface
{
    /**
     * Entry point for repository
     * @param array $data
     * @return mixed
     */
    public function execute(array $data);
}
