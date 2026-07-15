@extends('layouts.backend')
@section('page-title', 'Adicionar usuário')

@section('content')
<!-- Hero -->
<div class="content">
    <div class="d-md-flex justify-content-md-between align-items-md-center py-3 pt-md-3 pb-md-0 text-center text-md-start">
        <div>
            <h1 class="h3 mb-1">
                Adicionar Usuário
            </h1>
            <x-breadcrumb
                :items="[
                    ['label' => 'Dashboard', 'url' => route('dashboard')],
                    ['label' => 'Usuários', 'url' => route('users.index')],
                    ['label' => 'Adicionar']
                ]"
            />
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
    <!-- Info -->
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">Adicionar Usuário</h3>
            <x-block-options pin refresh collapse close />
        </div>
        <div class="block-content">
            <p>
                Preencha o formulário abaixo para adicionar um novo usuário.
            </p>


              <div class="row">
                {{-- <div class="col-lg-4">
                  <p class="text-muted">
                    You could also include labels
                  </p>
                </div> --}}
                <div class="col-lg-12">
                  <!-- Form Grid with Labels -->
                  <form action="{{ route('users.store') }}" method="POST">
                    @csrf
                    <div class="row mb-4">
                      <div class="col-3">
                        <label class="form-label">Nome</label>
                        <input type="text" name="name" class="form-control form-control-alt @error('name') is-invalid @enderror" value="{{ old('name') }}">
                        @error('name')
                          <div class="invalid-feedback">{{ $message }}</div>
                        @enderror 
                        </div>
                      <div class="col-3">
                        <label class="form-label">Email</label>
                        <input type="text" name="email" class="form-control form-control-alt @error('email') is-invalid @enderror" value="{{ old('email') }}">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="col-3">
                        <label class="form-label">Senha</label>
                        <input type="password" name="password" class="form-control form-control-alt @error('password') is-invalid @enderror">
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="col-3">
                        <label class="form-label">Confirmar Senha</label>
                        <input type="password" name="password_confirmation" class="form-control form-control-alt">
                      </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-check opacity-50 me-1"></i> Salvar
                            </button>
                        </div>
                    </div>
                  </form>
                  <!-- END Form Grid with Labels -->
                </div>
              </div>




        </div>
    </div>
    <!-- END Info -->

</div>
<!-- END Page Content -->
@endsection
