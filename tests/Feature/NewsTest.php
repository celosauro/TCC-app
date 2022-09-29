<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\News;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class NewsTest extends TestCase
{
    use DatabaseMigrations;

    public function test_the_news_returns_index(): void
    {
        $user = User::factory()->make();

        $response = $this->actingAs($user)
            ->get('/news');

        $response->assertSuccessful();
        $response->assertViewIs('news.index');
    }

    public function test_create_news(): void
    {
        $user = User::factory()->make();

        $news = News::factory()->make();

        $this->actingAs($user)
            ->post('/news', $news->toArray());

        $this->assertDatabaseHas('news', [
            'title' => $news->title,
            'description' => $news->description,
        ]);
    }

    public function test_delete_news(): void
    {
        $user = User::factory()->make();

        $news = News::factory()->create();

        $this->actingAs($user)
            ->delete(sprintf('/news/%s', $news->id));

        $this->assertDatabaseMissing('news', [
            'title' => $news->title,
            'description' => $news->description,
        ]);
    }

    public function test_validate_create_news(): void
    {
        $user = User::factory()->make();

        $news = News::factory()->make([
            'title' => '',
            'description' => '',
        ]);

        $this->actingAs($user)
            ->post('/news', $news->toArray())
            ->assertSessionHasErrors('title')
            ->assertSessionHasErrors('description');
    }
}
