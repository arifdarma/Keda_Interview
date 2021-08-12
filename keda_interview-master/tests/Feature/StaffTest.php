<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class StaffTest extends AuthenticatedTest
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_delete_customer()
    {
        $this->withoutExceptionHandling();

        $this->json('GET',route('delete',2),[],$this->header(2))->assertStatus(200);
    }

    public function test_show_all_customer()
    {
        $this->withoutExceptionHandling();

        $this->json('GET',route('all_customer'),[],$this->header(2))->assertStatus(200);
    }
}
