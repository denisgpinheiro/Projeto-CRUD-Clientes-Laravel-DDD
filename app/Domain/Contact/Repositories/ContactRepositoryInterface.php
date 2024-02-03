<?php

namespace App\Domain\Contact\Repositories;

use App\Domain\Contact\Models\Contact;

interface ContactRepositoryInterface
{
    public function all();

    public function create(array $data);

    public function update(Contact $contact, array $data);

    public function delete(Contact $contact);

    public function find($id);
}

?>