<?php

namespace App\InterfaceAdapters\Http\Controllers\Contact;

use App\InterfaceAdapters\Http\Controllers\Controller;
use App\InterfaceAdapters\Presenters\Api\ListContactsApiPresenter;
use App\UseCases\ListContacts\Boundaries\ListContactsInputBoundary;
use Illuminate\Http\JsonResponse;

class ListContactsController extends Controller
{
    public function __construct(
        private readonly ListContactsInputBoundary $interactor,
        private readonly ListContactsApiPresenter $presenter
    ) {
    }

    public function __invoke(): JsonResponse
    {
        $this->interactor->list();
        $viewModelArray = $this->presenter->getViewModel();

        return response()->json($viewModelArray);
    }
}
