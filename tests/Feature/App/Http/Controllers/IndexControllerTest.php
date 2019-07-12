<?php

namespace Tests\Feature\App\Http\Controllers;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class IndexControllerTest extends TestCase
{
    public function testIndexIsShowedCorrectly()
    {
        $response = $this->get('/');

        $response->assertStatus(200)->assertViewIs('main.index');
    }
}
