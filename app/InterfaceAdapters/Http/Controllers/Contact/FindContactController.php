<?php

namespace App\InterfaceAdapters\Http\Controllers\Contact;

use App\InterfaceAdapters\Http\Controllers\Controller;
use App\InterfaceAdapters\Presenters\Api\FindContactApiPresenter;
use App\UseCases\FindContact\Boundaries\FindContactInputBoundary;
use Illuminate\Http\JsonResponse;

class FindContactController extends Controller
{
    public function __construct(
        private readonly FindContactInputBoundary $interactor,
        private readonly FindContactApiPresenter $presenter
    ) {
    }

    public function __invoke(int $id): JsonResponse
    {
        $this->interactor->find($id);
        $viewModel = $this->presenter->getViewModel();

        return response()->json($viewModel);
    }
}
