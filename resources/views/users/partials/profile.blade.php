<!-- Form Grid with Labels -->
<form action="{{ route('users.updateProfile', $user->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="row mb-4">
        <div class="col-6">
            <label class="form-label">Tipo de usuário</label>
            <select name="type" class="form-select form-select-alt @error('type') is-invalid @enderror">
                <option value="">Selecione o tipo de usuário</option>
                <option value="pf" {{ old('type', $user?->profile?->type) == 'pf' ? 'selected' : '' }}>PF</option>
                <option value="pj" {{ old('type', $user?->profile?->type) == 'pj' ? 'selected' : '' }}>PJ</option>
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
