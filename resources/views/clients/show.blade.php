@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto mt-10 p-6 bg-white rounded shadow">
    <h1 class="text-2xl font-bold mb-6">Détails du client</h1>

    <p><strong>Nom :</strong> {{ $client->nom }}</p>
    <p><strong>Email :</strong> {{ $client->email ?? '-' }}</p>
    <p><strong>Téléphone :</strong> {{ $client->telephone ?? '-' }}</p>

    <div class="mt-6 space-x-4">
        <a href="{{ route('clients.edit', $client) }}" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded">Modifier</a>
        <a href="{{ route('clients.index') }}" class="text-gray-600 hover:underline">Retour à la liste</a>
    </div>
</div>
@endsection
