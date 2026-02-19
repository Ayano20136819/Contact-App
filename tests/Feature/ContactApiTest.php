<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Contact;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

// uses(RefreshDatabase::class);



test('example', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
});

it('return a list of contact', function(){
   $response = $this->get('/api/v1/contacts');
   $response->assertStatus(200);
   $response->assertJsonStructure([
       '*' => [
           'id',
           'family_name',
           'given_name',
           'nick_name',
           'title'
       ]
   ]);
});

it('return a single contact', function(){
    $response = $this->get('/api/v1/contacts/1');
    $response->assertStatus(200);
    $response->assertJsonStructure([
            'id',
            'family_name',
            'given_name',
            'nick_name',
            'title'
    ]);
});

it('return a newly created contact', function(){
   $attributes = Contact::factory()->raw();
   //dd($attributes);
   $response = $this->post('/api/v1/contacts', $attributes);
   $response->assertStatus(201)
            ->assertJsonStructure(['id','family_name','given_name','nick_name','title']);
   $this->assertDatabaseHas('contacts', $attributes);
});


// TODO: Create the missing given name when creating a contact test
it('returns create contact error when missing given name', function(){
    $attributes = Contact::factory()->raw([
       'given_name' => '',
    ]);
    //dd($attributes);
    $response = $this->putJson('/api/v1/contacts/1', $attributes);
    $response->assertStatus(422)
        ->assertJsonValidationErrors(['given_name']);

});



// TODO: Create the update contact test
it('returns a update contact', function(){
    $response = $this->patch('/api/v1/contacts/1', [
        'given_name' => 'John',
    ]);
    $response->assertStatus(200)
        ->assertJsonStructure(['id','family_name','given_name','nick_name','title']);
});



// TODO: Create the delete contact test
it('returns delete contact', function(){
    $response = $this->delete('/api/v1/contacts/1');
    $response->assertStatus(204);
});

