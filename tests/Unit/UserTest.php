<?php

namespace Tests\Unit;

use App\Models\User;
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

    public function test_user_duplication()
    {
        $user1 = User::make([
            'name' => 'John',
            'email' => 'john@email.com'
        ]);

        $user2 = User::make([
            'name' => 'Jane',
            'email' => 'jane@email.com'
        ]);

        $this->assertTrue($user1->name != $user2->name);
    }
}
