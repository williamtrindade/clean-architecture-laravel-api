<?php

namespace App\InterfaceAdapters\Http\Controllers\Contact;

use App\InterfaceAdapters\Http\Controllers\Controller;
use App\UseCases\DeleteContact\Boundaries\DeleteContactInputBoundary;
use Illuminate\Http\Response;

class DeleteContactController extends Controller
{
    public function __construct(
        private readonly DeleteContactInputBoundary $interactor
    ) {
    }

    public function __invoke(int $id): Response
    {
        $this->interactor->delete($id);
        return response()->noContent(); // Retorna 204 No Content
    }
}
