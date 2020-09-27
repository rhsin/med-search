<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MedTest extends TestCase
{
    public function testUserCanViewMedSearch()
    {
        $this->actingAs(User::find(1))->get('/medsearch')
            ->assertStatus(200);
    }

    public function testGuestRedirectedFromMedSearch()
    {
        $this->get('/medsearch')->assertStatus(302);
    }
}
