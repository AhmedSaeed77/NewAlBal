<?php


namespace App\Repository\Admin;


use Illuminate\Http\Request;

interface VideoRepositoryInterface
{
    /**
     * return Current Auth user videos
     * @param array $query
     * @param int $pagination
     * @return mixed
     */
    public function currentAdminVideos($query = [], $pagination = 10);
}
