<?php

namespace App\InterfaceAdapters\Http\Controllers\Contact;

use App\InterfaceAdapters\Http\Controllers\Controller;
use App\UseCases\ListContacts\Boundaries\ListContactsInputBoundary;
use Illuminate\Http\JsonResponse;

class ListContactsController extends Controller
{
    public function __construct(
        private readonly ListContactsInputBoundary $interactor
    ) {
    }

    public function __invoke(): JsonResponse
    {
        $contactsArray = $this->interactor->list();
        return response()->json($contactsArray);
    }
}
