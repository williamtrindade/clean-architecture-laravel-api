<?php

namespace App\InterfaceAdapters\Repositories;

use App\Entities\Contact;
use App\FrameworksAndDrivers\Models\ContactModel;
use App\UseCases\Contracts\ContactRepositoryInterface;

final class ContactRepository implements ContactRepositoryInterface
{
    private function toEntity(ContactModel $model): Contact
    {
        return new Contact(
            id: $model->id,
            name: $model->name,
            phoneNumber: $model->phone_number,
            email: $model->email
        );
    }

    public function existsByEmail(string $email): bool
    {
        return ContactModel::where('email', $email)->exists();
    }

    public function findById(int $id): ?Contact
    {
        $contactModel = ContactModel::find($id);

        return $contactModel ? $this->toEntity($contactModel) : null;
    }

    /**
     * @return array<Contact>
     */
    public function findAll(): array
    {
        return ContactModel::all()->map(fn (ContactModel $model) => $this->toEntity($model))->all();
    }

    public function save(Contact $contact): Contact
    {
        $contactModel = new ContactModel();
        $contactModel->name = $contact->getName();
        $contactModel->phone_number = $contact->getPhoneNumber();
        $contactModel->email = $contact->getEmail();
        $contactModel->save();

        return $this->toEntity($contactModel);
    }

    public function update(Contact $contact): Contact
    {
        $contactModel = ContactModel::findOrFail($contact->getId());

        $contactModel->name = $contact->getName();
        $contactModel->phone_number = $contact->getPhoneNumber();
        $contactModel->email = $contact->getEmail();
        $contactModel->update();

        return $this->toEntity($contactModel);
    }

    public function delete(int $id): bool
    {
        $contactModel = ContactModel::find($id);

        if ($contactModel) {
            return $contactModel->delete();
        }

        return false;
    }
}
