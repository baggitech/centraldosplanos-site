    <!-- Info -->
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">Perfil</h3>
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
                    <form action="{{ route('users.updateProfile', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row mb-4">
                            <div class="col-6">
                                <label class="form-label">Tipo de usuário</label>
                                <select name="type" class="form-select form-select-alt @error('type') is-invalid @enderror">
                                    <option value="">Selecione o tipo de usuário</option>
                                    <option value="admin" {{ old('type', $user?->profile?->type) == 'admin' ? 'selected' : '' }}>Administrador</option>
                                    <option value="manager" {{ old('type', $user?->profile?->type) == 'manager' ? 'selected' : '' }}>Gerente</option>
                                    <option value="user" {{ old('type', $user?->profile?->type) == 'user' ? 'selected' : '' }}>Usuário</option>
                                </select>
                                @error('type')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-12">
                                <label class="form-label">Endereço</label>
                                <input type="text" name="address" class="form-control form-control-alt @error('address') is-invalid @enderror" value="{{ old('address', $user?->profile?->address) }}">
                                @error('address')
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