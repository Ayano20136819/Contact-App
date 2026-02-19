<?php

use App\Models\Contact;
use Illuminate\Foundation\Testing\RefreshDatabaseState;
use App\Models\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

test('example', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
});

// Create a new user
test('return a new created user', function(){
    $attributes = User::factory()->raw();
    //dd($attributes);
    $response = $this->post('/api/v1/users', $attributes);
    $response->assertStatus(201)
            ->assertJsonStructure([
                'name',
                'email',
            ]);
    //$this->assertDatabaseHas('users', $attributes);
    // remember token ????
});

// Show All users
test('return a list of users', function(){
    $response = $this->get('/api/v1/users');
    $response->assertStatus(200);
    $response->assertJsonStructure([
        '*'=>[
            'id',
            'name',
            'email',
            //'password', ??
        ]
    ]);
});

// Show a user
test('return a single contact', function(){
    $response = $this->get('/api/v1/users/1');
    $response->assertStatus(200)
        ->assertJsonStructure([
            'name',
            'email',
            //'password'
        ]);
});

//  Update a user's details
test('return a updated user', function(){
    $response = $this->patch('/api/v1/users/1', [
        'name' => 'Updated user',
        'email' => 'update@example.com',
        'password' => 'Password1',
    ]);
    $response->assertStatus(200)
        ->assertJsonStructure([
            'name',
            'email',
        ]);
});


// Delete a user
test('return a deleted user', function(){
    $response = $this->delete('/api/v1/users/1');
    $response->assertStatus(204);
});
