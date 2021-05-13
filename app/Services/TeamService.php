<?php


namespace App\Services;


use App\Models\Team;

interface TeamService {

    /**
     * Find team by id.
     * @param int $id
     * @return Team
     */
    public function findById(int $id): Team;
}
