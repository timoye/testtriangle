<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class AffiliateTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testCheckSelectedAffiliatesEndpoint()
    {
        $response = $this->getJson('/api/get-selected-affiliates');
        $response->assertStatus(200)
            ->assertJsonStructure(
            [
                [
                    'affiliate_id',
                    'name',
                    'distance_from_office',
                ]
            ]);
    }

    public function testFormRouteIsGet(){
        $response = $this->postJson('/');
        $response->assertStatus(405);
    }

    public function testResultsSubmitRouteIsPost(){
        $response = $this->getJson('/results');
        $response->assertStatus(405);
    }

    public function testSubmitRouteRequiresFile(){
        $response = $this->postJson('/results');
        $response->assertStatus(422)
            ->assertJson([
                "message" => "The given data was invalid.",
                "errors" => [
                    "file" => ["The file field is required."],
                ]]
            );
    }

}
