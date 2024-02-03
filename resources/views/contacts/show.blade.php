@extends('layouts.app')

@section('content')
    <div style="display: flex; justify-content: center; align-items: center; height: 100vh;">
        <div style="width: 50%;">
            <div style="background-color: #fff; border-radius: 10px; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1); padding: 20px;">
                <h2 style="text-align: center; margin-bottom: 20px;">Detalhes do Contato</h2>
                <p><strong>Nome:</strong> {{ $contact->nome }}</p>
                <p><strong>Contato:</strong> {{ $contact->contato }}</p>
                <p><strong>E-mail:</strong> {{ $contact->email }}</p>
                <div style="text-align: center;">
                    <a href="{{ route('contacts.edit', $contact->id) }}" style="background-color: #007bff; color: #fff; padding: 10px 20px; text-decoration: none; border-radius: 5px;">Editar</a>
                    <a href="{{ route('contacts.index') }}" style="background-color: #6c757d; color: #fff; padding: 10px 20px; text-decoration: none; border-radius: 5px; margin-left: 10px;">Voltar</a>
                </div>
            </div>
        </div>
    </div>
@endsection
