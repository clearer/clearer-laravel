<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class WelcomeTest extends TestCase
{
    /**
     * Root should redirect to Project dashboard
     *
     * @return void
     */
    public function testRedirectToProjects()
    {
        $response = $this->get('/');
        $response->assertRedirect('/projects');
    }
}
