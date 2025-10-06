<?php

namespace App\FrameworksAndDrivers\Providers;

use App\InterfaceAdapters\Presenters\Api\CreateContactApiPresenter;
use App\InterfaceAdapters\Presenters\Api\FindContactApiPresenter;
use App\InterfaceAdapters\Presenters\Api\ListContactsApiPresenter;
use App\InterfaceAdapters\Presenters\Api\UpdateContactApiPresenter;
use App\InterfaceAdapters\Repositories\ContactRepository;
use App\UseCases\Contracts\ContactRepositoryInterface;
use App\UseCases\CreateContact\Boundaries\CreateContactInputBoundary;
use App\UseCases\CreateContact\Boundaries\CreateContactOutputBoundary;
use App\UseCases\CreateContact\CreateContactInteractor;
use App\UseCases\DeleteContact\Boundaries\DeleteContactInputBoundary;
use App\UseCases\DeleteContact\DeleteContactInteractor;
use App\UseCases\FindContact\Boundaries\FindContactInputBoundary;
use App\UseCases\FindContact\Boundaries\FindContactOutputBoundary;
use App\UseCases\FindContact\FindContactInteractor;
use App\UseCases\ListContacts\Boundaries\ListContactsInputBoundary;
use App\UseCases\ListContacts\Boundaries\ListContactsOutputBoundary;
use App\UseCases\ListContacts\ListContactsInteractor;
use App\UseCases\UpdateContact\Boundaries\UpdateContactInputBoundary;
use App\UseCases\UpdateContact\Boundaries\UpdateContactOutputBoundary;
use App\UseCases\UpdateContact\UpdateContactInteractor;
use Illuminate\Support\ServiceProvider;

class CleanArchServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        // --- Ligação do Repositório (Adaptador de Dados) ---
        $this->app->bind(ContactRepositoryInterface::class, ContactRepository::class);

        // --- Ligação dos Presenters (Adaptadores de Saída) ---
        $this->app->singleton(CreateContactApiPresenter::class);
        $this->app->singleton(FindContactApiPresenter::class);
        $this->app->singleton(ListContactsApiPresenter::class);
        $this->app->singleton(UpdateContactApiPresenter::class);;
        $this->app->bind(CreateContactOutputBoundary::class, CreateContactApiPresenter::class);
        $this->app->bind(FindContactOutputBoundary::class, FindContactApiPresenter::class);
        $this->app->bind(ListContactsOutputBoundary::class, ListContactsApiPresenter::class);
        $this->app->bind(UpdateContactOutputBoundary::class, UpdateContactApiPresenter::class);


        // --- Ligação dos Casos de Uso (Interactors) ---
        $this->app->bind(CreateContactInputBoundary::class, CreateContactInteractor::class);
        $this->app->bind(DeleteContactInputBoundary::class, DeleteContactInteractor::class);
        $this->app->bind(FindContactInputBoundary::class, FindContactInteractor::class);
        $this->app->bind(ListContactsInputBoundary::class, ListContactsInteractor::class);
        $this->app->bind(UpdateContactInputBoundary::class, UpdateContactInteractor::class);
    }
}
