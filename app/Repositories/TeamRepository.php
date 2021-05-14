<?php


namespace App\Repositories;


use App\Http\Requests\Request;
use App\Models\Team;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface TeamRepository {

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
}
