<?php


namespace App\JBE\Repositories;


interface RepositoryInterface
{
    /**
     * Execute the
     * @param array $data
     * @return mixed
     */
    public function execute(array $data);
}
