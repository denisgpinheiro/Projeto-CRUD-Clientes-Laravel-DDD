@extends('layouts.app')

@section('content')
    <div style="display: flex; justify-content: center; align-items: center; height: 100vh;">
        <div style="width: 50%;">
            <div style="background-color: #fff; border-radius: 10px; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1); padding: 20px;">
                <h2 style="text-align: center; margin-bottom: 20px;">Editar Contato</h2>

                @if ($errors->any())
                    <div style="background-color: #f8d7da; color: #721c24; padding: 10px; border-radius: 5px; margin-bottom: 20px;">
                        <ul style="margin: 0; padding: 0;">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                
                <form method="POST" action="{{ route('contacts.update', $contact->id) }}">
                    @csrf
                    @method('PUT')
                    <div style="margin-bottom: 20px;">
                        <label for="nome" style="display: block; margin-bottom: 5px;">Nome:</label>
                        <input type="text" name="nome" id="nome" class="form-control" style="width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #ced4da;" value="{{ old('nome', $contact->nome) }}">
                    </div>
                    <div style="margin-bottom: 20px;">
                        <label for="contato" style="display: block; margin-bottom: 5px;">Contato:</label>
                        <input type="text" name="contato" id="contato" class="form-control" style="width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #ced4da;" value="{{ old('contato', $contact->contato) }}">
                    </div>
                    <div style="margin-bottom: 20px;">
                        <label for="email" style="display: block; margin-bottom: 5px;">E-mail:</label>
                        <input type="email" name="email" id="email" class="form-control" style="width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #ced4da;" value="{{ old('email', $contact->email) }}">
                    </div>
                    <button type="submit" class="btn btn-primary" style="width: 100%; padding: 10px; border-radius: 5px; background-color: #007bff; border: none; cursor: pointer;">Salvar Contato</button>
                </form>
            </div>
        </div>
    </div>
@endsection
