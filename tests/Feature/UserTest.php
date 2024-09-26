<?php

namespace Tests\Feature;

use App\Models\User;
use Database\Seeders\UserSeeder;
use Illuminate\Support\Facades\Log;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     *  Tes create new user
     */
    public function testCreateUsers()
    {
        $this->post('/api/users', [
            "name" => "John Doe",
            "age" => 35,
            "job_title" => "IT Programming",
            "company" => "PT Maha Akbar Sejahtera",
        ])->assertStatus(201)
            ->assertJson([
                "data" => [
                    "name" => "John Doe",
                    "age" => 35,
                    "job_title" => "IT Programming",
                    "company" => "PT Maha Akbar Sejahtera",
                ]
            ]);
    }

    /**
     *  Tes gagal create user
     */
    public function testCreateUserFailed()
    {
        $this->post('/api/users', [
            "name" => str_repeat('test', 70),
            "age" => 35,
            "job_title" => "IT Programming",
            "company" => "PT Maha Akbar Sejahtera",
        ])->assertStatus(400)
            ->assertJson([
                "errors" => [
                    "name" => [
                        "The name field must not be greater than 255 characters."
                    ]
                ]
            ]);
    }

    /**
     *  Tes get user berdasarkan id
     */
    public function testGetUserById()
    {
        $this->seed([UserSeeder::class]);

        $user = User::query()->limit(1)->first();

        $this->get('/api/users/' . $user->id)
            ->assertStatus(200)
            ->assertJson([
                "data" => [
                    "name" => "John Doe",
                    "age" => 35,
                    "job_title" => "IT Programming",
                    "company" => "PT Maha Akbar Sejahtera",
                ]
            ]);
    }

    /**
     *  Tes get user not found
     */
    public function testGetUserNotFound()
    {
        $this->seed([UserSeeder::class]);

        $user = User::query()->limit(1)->first();

        $this->get('/api/users/' . ($user->id + 20))
            ->assertStatus(404)
            ->assertJson([
                'errors' => [
                    'message' => 'User not found.'
                ]
            ]);
    }

    /**
     *  Tes search data user
     */
    public function testSearchByName()
    {
        $this->seed([UserSeeder::class]);

        $response = $this->get('/api/users?name=john')
            ->assertStatus(200)
            ->json();

        Log::info(json_encode($response, JSON_PRETTY_PRINT));

        self::assertEquals(5, count($response['data']));
        self::assertEquals(10, $response['meta']['total']);
    }

    /**
     *  Tes search data not found
     */
    public function testSearchNotFound()
    {
        $this->seed([UserSeeder::class]);

        $response = $this->get('/api/users?name=tidakada')
            ->assertStatus(200)
            ->json();

        Log::info(json_encode($response, JSON_PRETTY_PRINT));

        self::assertEquals(0, count($response['data']));
        self::assertEquals(0, $response['meta']['total']);
    }

    /**
     *  Tes searh with pagination
     */
    public function testSearchWithPage()
    {
        $this->seed([UserSeeder::class]);

        $response = $this->get('/api/users?size=5&page=2')
            ->assertStatus(200)
            ->json();

        Log::info(json_encode($response, JSON_PRETTY_PRINT));

        self::assertEquals(5, count($response['data']));
        self::assertEquals(10, $response['meta']['total']);
        self::assertEquals(2, $response['meta']['current_page']);
    }

    /**
     *  Tes hapus data user
     */
    public function testDeleteSuccess()
    {
        $this->seed([UserSeeder::class]);

        $user = User::query()->limit(1)->first();

        $this->delete('/api/users/' . $user->id)
            ->assertStatus(200)
            ->assertJson([
                'data' => true
            ]);
    }

    /**
     *  Tes gagal hapus data
     */
    public function testDeleteFailed()
    {
        $this->seed([UserSeeder::class]);

        $user = User::query()->limit(1)->first();

        $this->delete('/api/users/' . ($user->id + 1000))
            ->assertStatus(404)
            ->assertJson([
                'errors' => [
                    'message' => 'User not found.'
                ]
            ]);
    }

    /**
     *  Tes update data user
     */
    public function testUpdateSuccess()
    {
        $this->seed([UserSeeder::class]);

        $user = User::query()->limit(1)->first(); // Get user

        $this->put('/api/users/' . $user->id, [
            "name" => "Anton Sudrajat",
            "age" => 35,
            "job_title" => "IT Programming 2",
            "company" => "PT Maha Akbar Sejahtera 2"
        ], [])->assertStatus(200)
            ->assertJson([
                'data' => [
                    "name" => "Anton Sudrajat",
                    "age" => 35,
                    "job_title" => "IT Programming 2",
                    "company" => "PT Maha Akbar Sejahtera 2"
                ]
            ]);
    }
}
