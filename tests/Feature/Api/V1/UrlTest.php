<?php

namespace Tests\Feature\Api\V1;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UrlTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_store_url()
    {
        $user = User::factory()->create();

        $this
            ->actingAs($user)
            ->postJson(route('urls.store', [
                'long_url' => 'https://www.notion.so/Migration-53902902be7544059458dfab7c5a59c3?showMoveTo=true',
            ]))
            ->assertCreated()
            ->assertJson([
                'long_url' => 'https://www.notion.so/Migration-53902902be7544059458dfab7c5a59c3?showMoveTo=true',
            ]);

        $this->assertDatabaseCount('urls', 1);
    }

    /** @test */
    public function user_cannot_store_multiple_short_url_against_similar_long_url()
    {
        $user = User::factory()->create();
        $user->urls()->create([
            'long_url' => 'https://www.notion.so/Migration-53902902be7544059458dfab7c5a59c3?showMoveTo=true',
            'short_url' => 'http://localhost:8000/uhd832h3',
        ]);

        $this
            ->actingAs($user)
            ->postJson(route('urls.store', [
                'long_url' => 'https://www.notion.so/Migration-53902902be7544059458dfab7c5a59c3?showMoveTo=true',
            ]))
            ->assertCreated()
            ->assertJson([
                'long_url' => 'https://www.notion.so/Migration-53902902be7544059458dfab7c5a59c3?showMoveTo=true',
                'short_url' => 'http://localhost:8000/uhd832h3',
            ]);

        $this->assertDatabaseCount('urls', 1);
        $this->assertDatabaseHas('urls', [
            'long_url' => 'https://www.notion.so/Migration-53902902be7544059458dfab7c5a59c3?showMoveTo=true',
            'short_url' => 'http://localhost:8000/uhd832h3',
            'user_id' => 1,
        ]);
    }
}
