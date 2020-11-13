<?php

namespace Tests;

use App\Models\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    public function setup(){
        parent::setUp();
        $this->withoutExceptionHandling();
    }

    public function logInUser($args = []){

        //create and then log in the user
        $user = factory(User::class)->create($args);
        $this->actingAs($user);
    }
}
