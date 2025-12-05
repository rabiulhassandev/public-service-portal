<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ComplaintSubmissionTest extends TestCase
{
    use RefreshDatabase;

    public function test_citizen_can_submit_complaint()
    {
        $user = User::factory()->create([
            'role' => 'citizen',
        ]);

        $response = $this->actingAs($user)
            ->postJson(route('complaints.store'), [
                'union_name' => 'Satkania',
                'word_number' => '1',
                'subject' => 'Broken Road',
                'message' => 'The road near the market is broken.',
            ]);

        $response->assertStatus(200)
            ->assertJson(['message' => 'Complaint submitted successfully!']);

        $this->assertDatabaseHas('complaints', [
            'user_id' => $user->id,
            'subject' => 'Broken Road',
            'status' => 'pending',
        ]);
    }

    public function test_guest_cannot_submit_complaint()
    {
        $response = $this->postJson(route('complaints.store'), [
            'union_name' => 'Satkania',
            'word_number' => '1',
            'subject' => 'Broken Road',
            'message' => 'The road near the market is broken.',
        ]);

        $response->assertStatus(401);
    }
}
