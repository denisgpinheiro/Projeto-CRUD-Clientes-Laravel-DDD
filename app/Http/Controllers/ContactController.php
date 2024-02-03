<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Domain\Contact\Models\Contact;
use App\Domain\Contact\Services\ContactService;
use App\Http\Requests\ContactRequest;
use App\Http\Controllers\Controller;


class ContactController extends Controller
{
    protected $contactService;
    
    public function __construct(ContactService $contactService)
    {
        $this->contactService = $contactService;
    }
    
    public function index()
    {
        $contacts = $this->contactService->getAllContacts();
        return view('contacts.index', compact('contacts'));
    }
    
    public function create()
    {
        return view('contacts.create');
    }

    public function store(ContactRequest $request)
    {
        try {
            $validatedData = $request->validated();
            $this->contactService->createContact($validatedData);
            return redirect()->route('contacts.index');
            
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->validator->errors())->withInput();
        }
        
    }
    
    public function show($id)
    {
        $contact = $this->contactService->getContactById($id);
        return view ('contacts.show', compact('contact'));
    }
    
    public function edit($id)
    {
        $contact = $this->contactService->getContactById($id);
        return view('contacts.edit', compact('contact'));
    }
    
    public function update(ContactRequest $request, $id)
    {
        $contact = $this->contactService->getContactById($id);
        $this->contactService->updateContact($contact, $request->validated());
        return redirect()->route('contacts.index');
    }
    
    public function destroy($id)
    {
        $contact = $this->contactService->getContactById($id);
        $this->contactService->deleteContact($contact);
        return redirect()->route('contacts.index');
    }
    //
}
