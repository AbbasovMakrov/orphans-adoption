<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->withoutExceptionHandling();
        $response = $this->post('/login',[
            "email" => "abbasaljoker@gmail.com",
            "password" => "abbas"
        ]);

        $response->assertOk();
    }

}
