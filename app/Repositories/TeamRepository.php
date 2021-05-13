<?php


namespace App\Repositories;


use App\Models\Team;

interface TeamRepository {

    /**
     * Find team by id.
     * @param int $id
     * @return Team
     */
    public function findById(int $id): Team;
}
