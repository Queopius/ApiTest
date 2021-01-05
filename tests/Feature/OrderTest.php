<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class OrderTest extends TestCase
{
    /**
     * @test
     */
    function order_post_one()
    {
        $this->postJson('/orders', ['order_number' => 'SDF454EF'])
                ->assertStatus(201);
    }
}
