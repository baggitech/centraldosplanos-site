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

    @include('users.partials.basic-details')

    @include('users.partials.profile')

    @include('users.partials.roles')

    @include('users.partials.interests')
    


</div>
<!-- END Page Content -->
@endsection
