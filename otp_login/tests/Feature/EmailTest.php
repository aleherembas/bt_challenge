<?php

namespace Tests\Feature;

use App\Mail\OTPMail;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;
use Couchbase\fastlzCompress;

class EmailTest extends TestCase

{
    use DatabaseMigrations;
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function an_otp_email_is_send_when_user_is_logged_in()
    {
        Mail::fake();
        $user = factory(User::class)->create();
        $res = $this->post('/login', ['email'=> $user->email, 'password' => 'secret']);
        Mail::assertSent(OTPMail::class);
    }

    /**
     * @test
     */
    public function an_otp_email_is_not_send_if_credentials_are_incorrect()

    {
        Mail::fake();
        $this->withExceptionHandling();
        $user = factory(User::class)->create();
        $res = $this->post('/login', ['email'=> $user->email, 'password' => 'secret']);
        Mail::assertNotSent(OTPMail::class);
    }
    /**
     * @test
     */
    public function otp_stored_cache_for_user(){

        $user = factory(User::class)->create();
        $res = $this->post('/login', ['email'=> $user->email, 'password' => 'secret']);
        $this->assertNotNull($user->otp());
    }
}
