<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class VerifyOTPTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * A basic feature test example.
     *
     * @return void
     */

    /**
     * @test
     */
    public function a_user_can_submit_otp_get_verified()
    {
        $this->logInUser();

        $otp = auth()->user()->cacheTheOTP();
        $this->post('/verifyOTP', ['otp' => $otp]) -> assertStatus(302);
        $this->assertDatabaseHas('users',['isVerified' => 1]);
    }

    public function user_can_see_otp_verify_page(){

        $this->logInUser();
        $this->get('/verifyOTP')
            ->assertStatus(200)
            ->assertSee('Enter OTP');

    }
}
