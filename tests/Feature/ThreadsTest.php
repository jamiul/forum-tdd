<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Thread;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ThreadsTest extends TestCase
{
    use RefreshDatabase;
    /** @test */
    public function a_user_can_view_all_threads()
    {
        $thread = Thread::factory()->create();

        $response = $this->get('/threads');
        $response->assertSee($thread->title);
    }

    /** @test */
    public function a_user_can_read_a_single_thread()
    {
        $thread = Thread::factory()->create();

        $response = $this->get('/threads/' . $thread->id);
        $response->assertSee($thread->title);
    }
}