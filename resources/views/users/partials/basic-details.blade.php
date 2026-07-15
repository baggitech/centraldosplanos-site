    <!-- Info -->
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">Dados Básicos do Usuário</h3>
            <x-block-options pin refresh collapse close />
        </div>
        <div class="block-content">
            <div class="row">
                <div class="col-lg-4">
                  <p class="text-muted">
                    You could also include labels
                  </p>
                </div>
                <div class="col-lg-8">
                    <!-- Form Grid with Labels -->
                    <form action="{{ route('users.update', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row mb-4">
                            <div class="col-6">
                                <label class="form-label">Nome</label>
                                <input type="text" name="name" class="form-control form-control-alt @error('name') is-invalid @enderror" value="{{ old('name') ?? $user->name }}">
                                @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-6">
                                <label class="form-label">Email</label>
                                <input type="text" name="email" class="form-control form-control-alt @error('email') is-invalid @enderror" value="{{ old('email') ?? $user->email }}">
                                @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-6">
                                <label class="form-label">Senha</label>
                                <input type="password" name="password" class="form-control form-control-alt @error('password') is-invalid @enderror">
                                @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-6">
                                <label class="form-label">Confirmar Senha</label>
                                <input type="password" name="password_confirmation" class="form-control form-control-alt @error('password_confirmation') is-invalid @enderror">
                                @error('password_confirmation')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror                            
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