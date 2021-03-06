<?php

namespace Tests\Feature\app\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ApiSearchControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */

    protected function setUp(): void
    {

        parent::setUp();

        // Commit here because the full text indexes are not filled in transaction.
        DB::commit();

        /**
         * Seed websites table because on each test all table are emptied.
         */

        $this->artisan('db:seed');

        // restart the transactions..
        DB::beginTransaction();
    }

    public function testSearchEndpointRequiredQuery()
    {


        $response = $this->json('get', route('api.search.index'));

        $response->assertJsonValidationErrors(['q']);

    }

    public function testSearchEndpointRespondOk()
    {

        $response = $this->json('get', route('api.search.index', ['q' => 'lorem']));

        $response->assertStatus(200);
    }

    public function testSearchResponseAsAspect()
    {

        $response = $this->json('get', route('api.search.index', ['q' => 'lorem']));

        $response->assertOk()
            ->assertJsonStructure(['data' =>
                [[
                    'object', 'id', 'title', 'url', 'description'
                ]]
            ]);

    }

    public function testSearchResponseReturnOnly10Records()
    {
        $response = $this->json('get', route('api.search.index', ['q' => 'lorem', 'limit' => 10]));

        $response->assertOk()
            ->assertJsonCount(10, 'data');

    }

    public function testSearchResponseReturnCorrectLimitRequired()
    {
        $response = $this->json('get', route('api.search.index', ['q' => 'lorem', 'limit' => 20]));
        $response->assertOk()
            ->assertJsonCount(20, 'data');


        $response = $this->json('get', route('api.search.index', ['q' => 'lorem', 'limit' => 2]));
        $response->assertOk()
            ->assertJsonCount(2, 'data');


        $response = $this->json('get', route('api.search.index', ['q' => 'lorem', 'limit' => 200]));
        $response->assertJsonValidationErrors(['limit']);


        $response = $this->json('get', route('api.search.index', ['q' => 'lorem', 'limit' => -2]));
        $response->assertJsonValidationErrors(['limit']);

    }

    public function testSearchResponseWithCorrectData()
    {

        $response = $this->json('get', route('api.search.index', ['q' => 'lorem', 'limit' => 5]));
        $websites = $response->assertOk()
            ->assertJsonCount(5, 'data')->decodeResponseJson();

        $websites = collect($websites['data'])->pluck('id')->toArray();
        $this->assertEquals([80, 2, 1, 58, 84], $websites);

    }


}
