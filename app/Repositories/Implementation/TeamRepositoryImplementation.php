<?php


namespace App\Repositories\Implementation;


use App\Http\Requests\Request;
use App\Models\Team;
use App\Repositories\TeamRepository;
use App\Utils\RepositoryUtil;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class TeamRepositoryImplementation implements TeamRepository {

    // You can add your relations here...
    private const RELATIONS = [];

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

    /**
     * @inheritDoc
     */
    public function findByName(string $name): Team {
        return Team::where('name', $name)->first() ?? new Team();
    }

    /**
     * @inheritDoc
     */
    public function search(Request $request): LengthAwarePaginator {
        $conference = $request->getInputAsString('conference');
        $division = $request->getInputAsString('division');
        $search = $request->getInputAsString('search');

        $teams = Team::with(self::RELATIONS);

        if (!empty($conference)) {
            $teams->where('conference', $conference);
        }

        if (!empty($division)) {
            $teams->where('division', $division);
        }

        if (!empty($search)) {
            $fields = ['name'];
            $condition = RepositoryUtil::composeRawLikeSqlQuery($fields, $search);
            $teams->whereRaw($condition);
        }

        return $teams->paginate($request->getPageLimit());
    }
}
