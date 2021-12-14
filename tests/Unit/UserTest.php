<?php

namespace Tests\Unit;

// This doesn't recognize the "get" method so we use Tests\TestCase
// use PHPUnit\Framework\TestCase;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */

    public function test_login_form()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }
}
