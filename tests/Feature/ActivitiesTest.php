<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Activities;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ActivitiesTest extends TestCase
{
    use DatabaseMigrations;

    public function test_the_activities_returns_index(): void
    {
        $user = User::factory()->make();

        $response = $this->actingAs($user)
            ->get('/activities');

        $response->assertSuccessful();
        $response->assertViewIs('activities.index');
    }

    public function test_create_activities(): void
    {
        $user = User::factory()->make();

        $activities = Activities::factory()->make();

        $this->actingAs($user)
            ->post('/activities', $activities->toArray());

        $this->assertDatabaseHas('activities', [
            'title' => $activities->title,
            'description' => $activities->description,
            'when' => $activities->when,
        ]);
    }

    public function test_delete_activities(): void
    {
        $user = User::factory()->make();

        $activities = Activities::factory()->create();

        $this->actingAs($user)
            ->delete(sprintf('/activities/%s', $activities->id));

        $this->assertDatabaseMissing('activities', [
            'title' => $activities->title,
            'description' => $activities->description,
            'when' => $activities->when,
        ]);
    }

    public function test_validate_create_activities(): void
    {
        $user = User::factory()->make();

        $activities = Activities::factory()->make([
            'title' => '',
            'description' => '',
            'when' => '',
        ]);

        $this->actingAs($user)
            ->post('/activities', $activities->toArray())
            ->assertSessionHasErrors('title')
            ->assertSessionHasErrors('description')
            ->assertSessionHasErrors('when');
    }
}
