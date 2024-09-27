<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class LoginPageTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_login_page_opens(): void
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }

    public function test_login_page_does_not_work_for_incorrect_data(): void
    {
        $response = $this->post('/login', ['email' => 'abc', 'password' => 'abc']);

        $response->assertStatus(302);
        $new_response = $this->get('/login');
        $new_response->assertStatus(200);
    }

    public function test_login_works_for_correct_data() 
    {
        $user = User::factory()->create(['password' => bcrypt('12345678')]);

        $response = $this->post('/login', ['email' => $user->email, 'password' => '12345678']);

        //$response->assertDatabaseHas('users', ['email' => 'abc@mail.com']);
        //$response->assertDatabaseMissing('user', ['email' => 'abc@mail.com']);
        $response->assertStatus(302);
        $response->assertRedirect('/dashboard');
    }
}
