<?php


namespace Tests\Feature;


use App\Constants\ConferenceConstant;
use App\Constants\DivisionConstant;
use Illuminate\Support\Str;
use Tests\TestCase;

class TeamTest extends TestCase {

    /**
     * Test create a team.
     *
     * @return void
     */
    public function testTeamCreation() {
        $name = Str::random(10);

        $payload = [
            'name' => $name,
            'conference' => ConferenceConstant::WEST,
            'division' => DivisionConstant::PACIFIC
        ];
        $response = $this->post('/api/teams', $payload);

        $response->assertSeeText($payload);
    }

    /**
     * Test create a team.
     *
     * @return void
     */
    public function testTeamCreationOnExistingTeamName() {
        // Create the new team record
        $payload = [
            'name' => 'Orlando Magick',
            'conference' => ConferenceConstant::WEST,
            'division' => DivisionConstant::PACIFIC
        ];
        $this->post('/api/teams', $payload);

        // Create the existing team record, expect to fail
        $payload = [
            'name' => 'Orlando Magick',
            'conference' => ConferenceConstant::WEST,
            'division' => DivisionConstant::PACIFIC
        ];
        $response = $this->post('/api/teams', $payload);
        $response->assertStatus(400);
    }
}
