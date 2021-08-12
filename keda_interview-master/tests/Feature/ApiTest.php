<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ApiTest extends AuthenticatedTest
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_login_customer()
    {
        $user = [
            'email'=>'customer@gmail.com',
            'password'=>'dummydummy'
        ];
        
        $this->withoutExceptionHandling();

        $this->json('POST',route('login'),$user)->assertStatus(200);
    }

    public function test_logout_customer()
    {
        $this->withoutExceptionHandling();
        
        $this->json('POST',route('logout'),[],$this->header(1))->assertStatus(200);
    }

    public function test_logout_staff()
    {
        $this->withoutExceptionHandling();
        
        $this->json('POST',route('logout'),[],$this->header(2))->assertStatus(200);
    }
}
