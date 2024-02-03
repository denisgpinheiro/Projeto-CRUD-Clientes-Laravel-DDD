@extends('layouts.app')

@section('content')
    <h1 style="text-align: center;">Lista de Contatos</h1>
    
    <table style="margin: 0 auto; width: 80%; border-collapse: collapse;">
        <thead>
            <tr>
                <th style="padding: 10px;">Nome</th>
                <th style="padding: 10px;">Contato</th>
                <th style="padding: 10px;">Email</th>
                <th style="padding: 10px;">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($contacts as $contact)
            <tr>
                <td style="padding: 10px;">{{ $contact->nome }}</td>
                <td style="padding: 10px;">{{ $contact->contato }}</td>
                <td style="padding: 10px;">{{ $contact->email }}</td>
                <td style="padding: 10px;">
                    <a href="{{ route('contacts.show', $contact->id) }}" style="background-color: #28a745; color: #fff; padding: 5px 10px; text-decoration: none; border-radius: 5px;">Detalhes</a> |
                    <a href="{{ route('contacts.edit', $contact->id) }}" style="background-color: #007bff; color: #fff; padding: 5px 10px; text-decoration: none; border-radius: 5px;">Editar</a> |
                    <form style="display: inline-block;" action="{{ route('contacts.destroy', $contact->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="background-color: #dc3545; color: #fff; padding: 5px 10px; border: none; border-radius: 5px; cursor: pointer;">Excluir</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
    <div style="text-align: center; margin-top: 20px;">
        <a href="{{ route('contacts.create') }}" style="padding: 10px 20px; background-color: #007bff; color: #fff; text-decoration: none; border-radius: 5px;">Novo Contato</a>
    </div>
@endsection
