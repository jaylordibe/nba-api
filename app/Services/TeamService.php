<?php


namespace App\Services;


use App\Http\Requests\Request;
use App\Http\Requests\TeamRequest;
use App\Models\Team;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface TeamService {

    /**
     * Find team by id.
     * @param int $id
     * @return Team
     */
    public function findById(int $id): Team;

    /**
     * Find team by name.
     * @param string $name
     * @return Team
     */
    public function findByName(string $name): Team;

    /**
     * Search teams.
     * @param Request $request
     *     string conference (optional) - the conference where the team(s) belongs
     *     string division (optional) - the conference where the team(s) belongs
     *     string search (optional) - search query
     * @return LengthAwarePaginator
     */
    public function search(Request $request): LengthAwarePaginator;

    /**
     * Create team.
     * @param TeamRequest $request
     * @return Team
     */
    public function create(TeamRequest $request): Team;

    /**
     * Update team.
     * @param int $teamId
     * @param TeamRequest $request
     * @return Team
     */
    public function update(int $teamId, TeamRequest $request): Team;

    /**
     * Delete team.
     * @param int $teamId
     * @param Request $request
     * @return bool
     */
    public function delete(int $teamId, Request $request): bool;
}
