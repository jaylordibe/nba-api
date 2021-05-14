<?php


namespace App\Http\Controllers;


use App\Http\Requests\Request;
use App\Http\Requests\TeamRequest;
use App\Http\Resources\TeamResource;
use App\Http\Resources\TeamsResource;
use App\Services\TeamService;
use App\Utils\ResponseUtil;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;

class TeamController extends Controller {

    private TeamService $teamService;

    /**
     * TeamController constructor.
     * @param TeamService $teamService
     */
    public function __construct(TeamService $teamService) {
        $this->teamService = $teamService;
    }

    /**
     * Create team.
     * @param TeamRequest $request
     * @return TeamResource|JsonResponse
     */
    public function create(TeamRequest $request) {
        $request->validated();
        $team = $this->teamService->create($request);

        if ($team->isEmpty()) {
            return ResponseUtil::error('Failed to create a team.');
        }

        return new TeamResource($team);
    }

    /**
     * Get all teams.
     * @param Request $request
     *     string conference (optional) - the conference where the team(s) belongs
     *     string division (optional) - the conference where the team(s) belongs
     *     string search (optional) - search query
     * @return TeamsResource
     */
    public function getAll(Request $request) {
        $teams = $this->teamService->search($request);

        return new TeamsResource($teams);
    }

    /**
     * Get team by id.
     * @param int $teamId - the team id of the team to be fetched
     * @param Request $request
     * @return TeamResource
     */
    public function getById(int $teamId, Request $request) {
        $team = $this->teamService->findById($teamId);

        return new TeamResource($team);
    }

    /**
     * Update team info.
     * @param int $teamId - the team id of the team to be updated
     * @param TeamRequest $request
     * @return TeamResource|JsonResponse
     */
    public function update(int $teamId, TeamRequest $request) {
        $request->validated();
        $team = $this->teamService->update($teamId, $request);

        if ($team->isEmpty()) {
            return ResponseUtil::error('Failed to update the team info.');
        }

        return new TeamResource($team);
    }

    /**
     * Delete team.
     * @param int $teamId - the team id of the team to be deleted
     * @param Request $request
     * @return JsonResponse
     */
    public function delete(int $teamId, Request $request) {
        $isDeleted = $this->teamService->delete($teamId, $request);

        if ($isDeleted) {
            return ResponseUtil::error('Failed to delete the team.');
        }

        return ResponseUtil::success('Team successfully deleted.');
    }
}
