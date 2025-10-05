<?php

namespace App\InterfaceAdapters\Http\Controllers\Contact;

use App\InterfaceAdapters\Http\Controllers\Controller;
use App\UseCases\UpdateContact\Boundaries\UpdateContactInputBoundary;
use App\UseCases\UpdateContact\DTOs\UpdateContactRequestModel;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UpdateContactController extends Controller
{
    public function __construct(
        private readonly UpdateContactInputBoundary $interactor
    ) {
    }

    public function __invoke(Request $request, int $id): JsonResponse
    {
        $requestModel = new UpdateContactRequestModel(
            id: $id,
            name: $request->get('name'),
            phoneNumber: $request->get('phone_number'),
            email: $request->get('email')
        );

        $updatedContactArray = $this->interactor->update($requestModel);
        return response()->json($updatedContactArray);
    }
}
