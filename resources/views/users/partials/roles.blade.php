<!-- Form Grid with Labels -->
<form action="{{ route('users.updateRoles', $user->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="row mb-4">
        <div class="col-6">
            <label class="form-label">Checkboxes</label>
            <div class="space-y-2">                
                @foreach ($roles as $role)
                <div class="form-check">
                    <input class="form-check-input @error('roles') is-invalid @enderror" type="checkbox" value="{{ $role->id }}" id="role-{{ $role->id }}" name="roles[]" @checked(in_array($role->id, $user?->roles->pluck('id')->toArray() ?? []))>
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
