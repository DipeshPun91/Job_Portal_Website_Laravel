<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HomePageTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_home_page_opens(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_home_page_has_content(): void
    {
        $view = $this->view('welcome');

        $view->assertSee('Register')->assertSee('Log in');
    }
}
