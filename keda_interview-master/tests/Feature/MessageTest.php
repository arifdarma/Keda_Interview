<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MessageTest extends AuthenticatedTest
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_send_message()
    {
        $message = [
            'id_to'=>'4',
            'message'=>'Teks pesan'
        ];
        
        $this->withoutExceptionHandling();

        $this->json('POST',route('send_message'),$message,$this->header(1))->assertStatus(201);
    }

    public function test_send_to_staff()
    {
        $message = [
            'id_to'=>'6',
            'message'=>'Teks pesan'
        ];
        
        $this->withoutExceptionHandling();

        $this->json('POST',route('send_message'),$message,$this->header(2))->assertStatus(201);
    }

    public function test_send_to_customer()
    {
        $message = [
            'id_to'=>'4',
            'message'=>'Teks pesan'
        ];
        
        $this->withoutExceptionHandling();

        $this->json('POST',route('send_message'),$message,$this->header(2))->assertStatus(201);
    }

    public function test_history_customer()
    {
        $this->withoutExceptionHandling();

        $this->json('GET',route('history_customer'),[],$this->header(1))->assertStatus(200);
    }

    public function test_history_staff()
    {
        $this->withoutExceptionHandling();

        $this->json('GET',route('all_history'),[],$this->header(2))->assertStatus(200);
    }
}
