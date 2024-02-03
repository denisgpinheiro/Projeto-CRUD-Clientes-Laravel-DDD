<?php

namespace App\Infrastructure\Repositories;

use App\Domain\Contact\Models\Contact;
use App\Domain\Contact\Repositories\ContactRepositoryInterface;

class ContactRepository implements ContactRepositoryInterface
{
  public function all()
  {
      return Contact::all();
  }
  
  public function create(array $data)
  {
      return Contact::create($data);
  }
  
  public function update(Contact $contact, array $data)
  {
      $contact->update($data);
      return $contact;
  }
  
  public function delete(Contact $contact)
  {
      $contact->delete();
  }
  
  public function find($id)
  {
      return Contact::findOrFail($id);
  }
    
}

?>