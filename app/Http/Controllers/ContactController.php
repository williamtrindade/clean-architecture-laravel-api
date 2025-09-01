<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(Request $request): array
    {
        try {
            $contact = new Contact();
            $contact->name         = $request->name;
            $contact->phone_number = $request->phone_number;
            $contact->email        = $request->email;
            $contact->save();

            return ['success' => true];
        } catch (\Exception $error) {
            return ['error' => $error];
        }
    }

    public function index(): \Illuminate\Database\Eloquent\Collection
    {
        $contact = Contact::all('id', 'email');
        return $contact;
    }

    public function show($id)
    {
        $contact = Contact::find($id);
        return $contact;
    }

    public function update(Request $request, $id): array
    {
        try {
            $contact = Contact::find($id);
            $contact->name = $request->name;
            $contact->phone_number = $request->phone_number;
            $contact->email = $request->email;
            $contact->update();
            return ['success' => true];
        } catch (\Exception $error) {
            return ['error' => $error];
        }
    }

    public function destroy($id): array
    {
        try {
            $contact = Contact::find($id);
            $contact->delete();
            return ['success' => true];
        } catch (\Exception $error) {
            return ['error' => $error];
        }
    }
}
