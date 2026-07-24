@extends('layouts.backend')
@section('page-title', 'Editar usuário')

@section('content')
<!-- Hero -->
<div class="content">
    <div class="d-md-flex justify-content-md-between align-items-md-center py-3 pt-md-3 pb-md-0 text-center text-md-start">
        <div>
            <h1 class="h3 mb-1">
                Editar Usuário
            </h1>
            <x-breadcrumb :items="[
                    ['label' => 'Dashboard', 'url' => route('dashboard')],
                    ['label' => 'Usuários', 'url' => route('users.index')],
                    ['label' => 'Editar']
                ]" />
        </div>
        <div class="mt-4 mt-md-0">
            <a class="btn btn-sm btn-alt-primary" href="{{ route('users.index') }}">
                <i class="fa fa-arrow-left"></i> Voltar
            </a>
        </div>
    </div>
</div>
<!-- END Hero -->


<!-- Page Content -->
<div class="content">

    @session('status')
    <div class="alert alert-success">
        {{ $value }}
    </div>
    @endsession

    <!-- Block Tabs With Options Default Style -->
    <div class="block block-rounded">
        <ul class="nav nav-tabs nav-tabs-block align-items-center" role="tablist">

            <li class="nav-item">
                <button class="nav-link active" id="btabswo-static-basic-tab" data-bs-toggle="tab" data-bs-target="#btabswo-static-basic" role="tab" aria-controls="btabswo-static-basic" aria-selected="true">Dados básicos</button>
            </li>

            <li class="nav-item">
                <button class="nav-link" id="btabswo-static-profile-tab" data-bs-toggle="tab" data-bs-target="#btabswo-static-profile" role="tab" aria-controls="btabswo-static-profile" aria-selected="false">Perfil</button>
            </li>

            <li class="nav-item">
                <button class="nav-link" id="btabswo-static-roles-tab" data-bs-toggle="tab" data-bs-target="#btabswo-static-roles" role="tab" aria-controls="btabswo-static-roles" aria-selected="false">Cargos</button>
            </li>

            <li class="nav-item">
                <button class="nav-link" id="btabswo-static-interests-tab" data-bs-toggle="tab" data-bs-target="#btabswo-static-interests" role="tab" aria-controls="btabswo-static-interests" aria-selected="false">Interesses</button>
            </li> 

            <li class="nav-item ms-auto">
                <div class="block-options ps-3 pe-3">
                    <button type="button" class="btn-block-option" data-toggle="block-option" data-action="fullscreen_toggle"></button>
                    <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                        <i class="si si-refresh"></i>
                    </button>
                    <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"></button>
                    <button type="button" class="btn-block-option" data-toggle="block-option" data-action="close">
                        <i class="si si-close"></i>
                    </button>
                </div>
            </li>
            
        </ul>
        <div class="block-content tab-content">

            <div class="tab-pane active" id="btabswo-static-basic" role="tabpanel" aria-labelledby="btabswo-static-basic-tab" tabindex="0">
                <h4 class="fw-normal">Conteúdo de dados básicos</h4>
                @include('users.partials.basic-details')
            </div>

            <div class="tab-pane" id="btabswo-static-profile" role="tabpanel" aria-labelledby="btabswo-static-profile-tab" tabindex="0">
                <h4 class="fw-normal">Conteúdo de perfil</h4>
                @include('users.partials.profile')
            </div>

            <div class="tab-pane" id="btabswo-static-roles" role="tabpanel" aria-labelledby="btabswo-static-roles-tab" tabindex="0">
                <h4 class="fw-normal">Conteúdo de cargos</h4>
                @include('users.partials.roles')
            </div>

            <div class="tab-pane" id="btabswo-static-interests" role="tabpanel" aria-labelledby="btabswo-static-interests-tab" tabindex="0">
                <h4 class="fw-normal">Conteúdo de interesses</h4>
                @include('users.partials.interests')
            </div>
            

        </div>
    </div>
    <!-- END Block Tabs With Options Default Style -->

</div>
<!-- END Page Content -->
@endsection
