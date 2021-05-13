<?php


namespace App\Services\Implementation;


use App\Models\Team;
use App\Repositories\TeamRepository;
use App\Services\TeamService;

class TeamServiceImplementation implements TeamService {

    private TeamRepository $teamRepository;

    /**
     * TeamServiceImplementation constructor.
     * @param TeamRepository $teamRepository
     */
    public function __construct(TeamRepository $teamRepository) {
        $this->teamRepository = $teamRepository;
    }

    /**
     * @inheritDoc
     */
    public function findById(int $id): Team {
        return $this->teamRepository->findById($id);
    }
}
