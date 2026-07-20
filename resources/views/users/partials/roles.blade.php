    <!-- Info -->
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">Cargos</h3>
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
                    <form action="{{ route('users.updateRoles', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row mb-4">
                            <div class="col-6">
                                <label class="form-label">Checkboxes</label>
                                <div class="space-y-2">
                                    <div class="form-check">
                                    @foreach ($roles as $role)
                                    <div class="form-check">
                                        <input class="form-check-input @error('roles') is-invalid @enderror" type="checkbox" value="{{ $role->id }}" id="role-{{ $role->id }}" name="roles[]" @checked(in_array($role->name, $user?->roles->pluck('name')->toArray() ?? []))>
                                        <label class="form-check-label" for="role-{{ $role->id }}">{{ $role->name }}</label>
                                        @if($loop->last)
                                            @error('roles')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        @endif
                                    </div>
                                    @endforeach
                                </div>
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