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


    // public function test_delete_user()
    // {
    //     $user = User::factory()->count(1)->make();

    //     $user = User::first();

    //     if ($user) {
    //         $user->delete();
    //     }

    //     $this->assertTrue($user == null);
    // }


    // This is a test that'll only work once since a user email must be unique
    // So only 1 user can register with it
    //     public function test_it_stores_new_users()
    //     {
    //         $response = $this->post('/register', [
    //             'name' => 'password123',
    //             'email' => 'password123@email.com',
    //             'password' => 'password123',
    //             'password_confirmation' => 'password123',
    //         ]);

    //         $response->assertRedirect('/home');
    //     }


    public function test_database()
    {
        $this->assertDatabaseHas('users', [
            'name' => 'Johnny'
        ]);
    }


    // Make sure user does not exist in users table
    public function test_database_missing()
    {
        $this->assertDatabaseMissing('users', [
            'name' => 'NotJohnny'
        ]);
    }


    public function test_if_seeders_works()
    {
        // Seed all seeders in the Seeders folder
        // it runs like "php artisan db:seed"
        $this->seed();

        // We aren't making any assertion so the test suite response is "risked"
        // ! if seeders works → This test did not perform any assertions
    }
}
