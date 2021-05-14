<?php


namespace App\Services\Implementation;


use App\Constants\ConferenceConstant;
use App\Constants\DivisionConstant;
use App\Constants\StatusConstant;
use App\Http\Requests\Request;
use App\Http\Requests\TeamRequest;
use App\Models\Team;
use App\Repositories\TeamRepository;
use App\Services\TeamService;
use App\Utils\DataTypeUtil;
use Exception;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Log;

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

    /**
     * @inheritDoc
     */
    public function findByName(string $name): Team {
        return $this->teamRepository->findByName($name);
    }

    /**
     * @inheritDoc
     */
    public function search(Request $request): LengthAwarePaginator {
        return $this->teamRepository->search($request);
    }

    /**
     * @inheritDoc
     */
    public function create(TeamRequest $request): Team {
        $name = $request->getInputAsString('name');
        $conference = ConferenceConstant::fromString($request->getInputAsString('conference'));
        $division = DivisionConstant::getValidDivision($conference, $request->getInputAsString('division'));

        if (empty($conference) || empty($division)) {
            return new Team();
        }

        $team = $this->findByName($name);

        if ($team->isNotEmpty()) {
            return new Team();
        }

        $team = new Team();
        $team->name = $name;
        $team->conference = $conference;
        $team->division = $division;
        $team->save();

        return $team;
    }

    /**
     * @inheritDoc
     */
    public function update(int $teamId, TeamRequest $request): Team {
        $conference = ConferenceConstant::fromString($request->getInputAsString('conference'));
        $division = DivisionConstant::getValidDivision($conference, $request->getInputAsString('division'));

        if (empty($conference) || empty($division)) {
            return new Team();
        }

        $team = $this->findById($teamId);

        if ($team->isEmpty()) {
            return new Team();
        }

        $currentTeamName = $team->name;
        $newTeamName = $request->getInputAsString('name');

        if ($newTeamName !== $currentTeamName) {
            $existingTeam = $this->findByName($newTeamName);

            if ($existingTeam->isNotEmpty()) {
                return new Team();
            }

            $team->name = $newTeamName;
        }

        $team->conference = $conference;
        $team->division = $division;
        $team->save();

        return $team;
    }

    /**
     * @inheritDoc
     */
    public function delete(int $teamId, Request $request): bool {
        $team = $this->findById($teamId);

        if ($team->isEmpty()) {
            return false;
        }

        $isDeleted = false;

        try {
            $isDeleted = DataTypeUtil::toBoolean($team->delete());
            $team->status = StatusConstant::DELETED;
            $team->save();
        } catch (Exception $e) {
            Log::error($e->getMessage());
        }

        return $isDeleted;
    }
}
