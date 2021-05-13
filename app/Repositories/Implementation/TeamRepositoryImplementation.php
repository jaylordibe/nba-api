<?php


namespace App\Repositories\Implementation;


use App\Models\Team;
use App\Repositories\TeamRepository;

class TeamRepositoryImplementation implements TeamRepository {

    /**
     * TeamRepositoryImplementation constructor.
     */
    public function __construct() {
    }

    /**
     * @inheritDoc
     */
    public function findById(int $id): Team {
        return Team::where('id', $id)->first() ?? new Team();
    }
}
