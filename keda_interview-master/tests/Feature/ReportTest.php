<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ReportTest extends AuthenticatedTest
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_logout_customer()
    {
        $report_data = [
            'id_reported' => '1',
            'report_message' => 'Pesan laporan'
        ];
        $this->withoutExceptionHandling();
        
        $this->json('POST',route('report'),$report_data,$this->header(1))->assertStatus(200);
    }
}
