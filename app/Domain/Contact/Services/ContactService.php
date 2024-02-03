<?php

namespace App\Domain\Contact\Services;

use App\Domain\Contact\Models\Contact;
use App\Domain\Contact\Repositories\ContactRepositoryInterface;

class ContactService
{
    protected $contactRepository;
    
    public function __construct(ContactRepositoryInterface $contactRepository)
    {
        $this->contactRepository = $contactRepository;
    }
    
    public function getAllContacts()
    {
        return $this->contactRepository->all();
    }
    
    public function createContact(array $data)
    {
        return $this->contactRepository->create($data);
    }
    
    public function updateContact(Contact $contact, array $data)
    {
        return $this->contactRepository->update($contact, $data);
    }
    
    public function deleteContact(Contact $contact)
    {
        return $this->contactRepository->delete($contact);
    }
    
    public function getContactById($id)
    {
        return $this->contactRepository->find($id);
    }
}

?>