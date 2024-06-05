@extends('layouts.admin')

@section('content')
    <h1>Crea un nuovo progetto</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Titolo</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
        </div>
        <div class="mb-3">
            <label for="client_name" class="form-label">Nome cliente</label>
            <input type="text" class="form-control" id="client_name" name="client_name" value="{{ old('client_name') }}">
        </div>
        <div class="mb-3">
            <label for="type_id" class="form-label">Category</label>
            <select class="form-select" id="type_id" name="type_id">
                <option value="">Seleziona un tipo</option>
                @foreach ($types as $type)
                    <option @selected($type->id == old('type_id')) value="{{ $type->id }}">{{ $type->name }}</option>
                @endforeach
            </select>
        <div>
        <div class="mb-3">
            <label for="cover_image" class="form-label">Immagine</label>
            <input class="form-control" type="file" id="cover_image" name="cover_image">
        </div>
        <div class="mb-3">
            <label for="summary" class="form-label">Descrizione</label>
            <textarea class="form-control" id="summary" rows="10" name="summary">{{ old('summary') }}</textarea>
          </div>
        <button type="submit" class="btn btn-primary">Salva</button>
    </form>
@endsection