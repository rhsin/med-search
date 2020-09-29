<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MedTest extends TestCase
{
    public function testMedsDatabase()
    {
        $this->assertDatabaseHas('meds', [
            'name' => 'IBRUTINIB 140MG TAB,ORAL',
        ]);
    }

    public function testUserCanViewMedSearch()
    {
        $this->actingAs(User::find(1))->get('/medsearch')
            ->assertStatus(200);
    }

    public function testGuestRedirectedFromMedSearch()
    {
        $this->get('/medsearch')->assertStatus(302);
    }

    public function testUserCanSearchMeds()
    {
        $this->actingAs(User::find(1))->get('/search/ibuprofen')
            ->assertStatus(200);
    }

    // public function testGuestCannotSearchMeds()
    // {
    //     $this->get('/search/ibuprofen')->assertStatus(403);
    // }

    public function testUserCanSearchFirst()
    {
        $this->actingAs(User::find(1))->get('/first/ibuprofen')
            ->assertStatus(200);
    }

    public function testUserCanAttachMed()
    {
        $this->actingAs(User::find(1))->put('meds/5')
            ->assertStatus(201);
    }

    public function testUserCanDetachMed()
    {
        $this->actingAs(User::find(1))->delete('/meds/5')
            ->assertStatus(204);
    }

    // public function testGuestCannotAttachMed()
    // {
    //     $this->put('meds/5')->assertStatus(403);
    // }
}
