<?php
namespace Tests\Feature;


use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LoginTest extends TestCase
{

    use DatabaseMigrations;
    /**
     * @test
     */
   public function after_login_user_cant_acces_home_til_verified()
   {
        $this->logInUser();
        $this->get('/home')->assertRedirect('/verifyOTP');
   }

    /**
     * @test
     */

   public function after_login_user_can_access_home_if_verified(){

       $this->logInUser(['isVerified' => 1]);

       $this->get('/home')->assertStatus(200);
   }

}
