<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthenticatedTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    protected function create_token($id){
        if($id==1){
            $defaultUser = [
                'email'=>'customer@gmail.com',
                'password' => 'dummydummy'
            ];
        }elseif ($id==2) {
            $defaultUser = [
                'email'=>'staff@gmail.com',
                'password' => 'dummydummy'
            ];
        }

        $token = auth()->attempt($defaultUser);

        return $token;
    }
    protected function header($id){
        $header_json = ['Authorization'=> 'Bearer'.$this->create_token($id)];
        return $header_json;
    }

    public function testBasicTest()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
