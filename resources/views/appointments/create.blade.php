@extends('layouts.app')

@section('title', 'Ajouter un rendez-vous')

@section('content')
<h1 class="text-2xl font-bold mb-6">Ajouter un rendez-vous</h1>

@if ($errors->any())
<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
    <ul class="list-disc pl-5">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('appointments.store') }}" method="POST" class="bg-white p-6 rounded shadow-md max-w-lg">
    @csrf
    <div class="mb-4">
        <label for="client_id" class="block text-gray-700 font-semibold mb-2">Client</label>
        <select name="client_id" id="client_id" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-600" required>
            <option value="">-- Choisir un client --</option>
            @foreach ($clients as $client)
            <option value="{{ $client->id }}" {{ old('client_id') == $client->id ? 'selected' : '' }}>
                {{ $client->nom }}
            </option>
            @endforeach
        </select>
    </div>

    <div class="mb-4">
        <label for="date" class="block text-gray-700 font-semibold mb-2">Date</label>
        <input type="date" name="date" id="date" value="{{ old('date') }}" required class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-600">
    </div>

    <div class="mb-4">
        <label for="time" class="block text-gray-700 font-semibold mb-2">Heure</label>
        <input type="time" name="time" id="time" value="{{ old('time') }}" required class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-600">
    </div>

    <div class="mb-4">
        <label for="description" class="block text-gray-700 font-semibold mb-2">Description (optionnelle)</label>
        <textarea name="description" id="description" rows="3" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-600">{{ old('description') }}</textarea>
    </div>

    <div class="mb-6">
        <label for="status" class="block text-gray-700 font-semibold mb-2">Statut</label>
        <select name="status" id="status" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-600" required>
            <option value="prévu" {{ old('status') == 'prévu' ? 'selected' : '' }}>Prévu</option>
            <option value="en attente" {{ old('status') == 'en attente' ? 'selected' : '' }}>En attente</option>
            <option value="annulé" {{ old('status') == 'annulé' ? 'selected' : '' }}>Annulé</option>
            <option value="terminé" {{ old('status') == 'terminé' ? 'selected' : '' }}>Terminé</option>
        </select>
    </div>

    <div class="flex items-center space-x-4">
        <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-6 rounded">Enregistrer</button>
        <a href="{{ route('appointments.index') }}" class="text-gray-600 hover:underline">Annuler</a>
    </div>
</form>
@endsection
