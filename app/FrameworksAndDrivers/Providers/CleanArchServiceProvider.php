<?php

namespace App\FrameworksAndDrivers\Providers;

use Illuminate\Support\ServiceProvider;

class CleanArchServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        // --- Ligacao do Repositorio (Adaptador de Dados) ---
        $this->app->bind(
            \App\UseCases\Contracts\ContactRepositoryInterface::class,
            \App\InterfaceAdapters\Repositories\ContactRepository::class
        );

        // --- Ligacao dos Presenters (Adaptadores de Saida) ---
        $this->app->singleton(\App\InterfaceAdapters\Presenters\Api\CreateContactApiPresenter::class);
        $this->app->singleton(\App\InterfaceAdapters\Presenters\Api\FindContactApiPresenter::class);
        $this->app->singleton(\App\InterfaceAdapters\Presenters\Api\ListContactsApiPresenter::class);
        $this->app->singleton(\App\InterfaceAdapters\Presenters\Api\UpdateContactApiPresenter::class);

        $this->app->bind(
            \App\UseCases\CreateContact\Boundaries\CreateContactOutputBoundary::class,
            \App\InterfaceAdapters\Presenters\Api\CreateContactApiPresenter::class);
        $this->app->bind(
            \App\UseCases\FindContact\Boundaries\FindContactOutputBoundary::class,
            \App\InterfaceAdapters\Presenters\Api\FindContactApiPresenter::class);
        $this->app->bind(
            \App\UseCases\ListContacts\Boundaries\ListContactsOutputBoundary::class,
            \App\InterfaceAdapters\Presenters\Api\ListContactsApiPresenter::class);
        $this->app->bind(
            \App\UseCases\UpdateContact\Boundaries\UpdateContactOutputBoundary::class,
            \App\InterfaceAdapters\Presenters\Api\UpdateContactApiPresenter::class);


        // --- Ligacao dos Casos de Uso (Interactors) ---
        $this->app->bind(
            \App\UseCases\CreateContact\Boundaries\CreateContactInputBoundary::class,
            \App\UseCases\CreateContact\CreateContactInteractor::class);
        $this->app->bind(
            \App\UseCases\DeleteContact\Boundaries\DeleteContactInputBoundary::class,
            \App\UseCases\DeleteContact\DeleteContactInteractor::class);
        $this->app->bind(
            \App\UseCases\FindContact\Boundaries\FindContactInputBoundary::class,
            \App\UseCases\FindContact\FindContactInteractor::class);
        $this->app->bind(
            \App\UseCases\ListContacts\Boundaries\ListContactsInputBoundary::class,
            \App\UseCases\ListContacts\ListContactsInteractor::class);
        $this->app->bind(
            \App\UseCases\UpdateContact\Boundaries\UpdateContactInputBoundary::class,
            \App\UseCases\UpdateContact\UpdateContactInteractor::class);
    }
}
