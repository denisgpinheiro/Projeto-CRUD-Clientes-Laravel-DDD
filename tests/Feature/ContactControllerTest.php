<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Http\Request;
use App\Domain\Contact\Services\ContactService;
use App\Domain\Contact\Models\Contact;
use App\Http\Controllers\ContactController;
use App\Http\Requests\ContactRequest;

class ContactControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_contact()
    {
        $data = [
            'nome' => 'Denis Pinheiro',
            'contato' => '123456789',
            'email' => 'denis@example.com',
        ];

        $contact = Contact::create($data);

        $this->assertDatabaseHas('contacts', $data);
    }

    /** @test */
    public function it_requires_a_name_to_create_a_contact()
    {
        $response = $this->post(route('contacts.store'), [
            'contato' => '123456789',
            'email' => 'john@example.com',
        ]);

        $response->assertSessionHasErrors('nome');
    }

    /** @test */
    public function it_requires_a_unique_email_to_create_a_contact()
    {
        $existingContact = Contact::create([
            'nome' => 'Novo Denis',
            'contato' => '123456789',
            'email' => 'denispinheiro@alfasoft.pt',
        ]);
    
        $response = $this->post(route('contacts.store'), [
            'nome' => 'Novo Denis',
            'contato' => '987654321',
            'email' => 'denispinheiro@alfasoft.pt',
        ]);
    
        $response->assertSessionHasErrors('email');
    }
}
