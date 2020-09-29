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

    public function testUserCanSearchMeds()
    {
        $this->actingAs(User::find(1))->get('/api/search/ibuprofen')
            ->assertStatus(200);
    }

    public function testUserCanSearchFirst()
    {
        $this->actingAs(User::find(1))->get('/api/first/ibuprofen')
            ->assertStatus(200);
    }

    public function testUserCanAttachMed()
    {
        $this->actingAs(User::find(1))->put('/api/meds/5')
            ->assertStatus(201);
    }

    public function testUserCanDetachMed()
    {
        $this->actingAs(User::find(1))->delete('/api/meds/5')
            ->assertStatus(204);
    }

    // public function testGuestCannotSearchMeds()
    // {
    //     $this->get('/api/search/ibuprofen')->assertStatus(403);
    // }

    // public function testGuestCannotAttachMed()
    // {
    //     $this->put('/api/meds/5')->assertStatus(403);
    // }

    // public function testGuestCannotDetachMed()
    // {
    //     $this->delete('/api/meds/5')->assertStatus(403);
    // }
}
