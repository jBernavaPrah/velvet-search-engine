<?php

namespace Tests\Feature\App\Http\Controllers;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SearchControllerTest extends TestCase
{
    public function testSearchWorkAsAspect()
    {
        $response = $this->get(route('search', ['q' => 'lorem']));

        $response->assertOk()
            ->assertViewIs('search.index')->assertViewHas(['q','websites']);;
    }
}
