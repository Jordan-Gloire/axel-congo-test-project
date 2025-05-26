@extends('layouts.app')

@section('title', 'Détail du rendez-vous')

@section('content')
<h1 class="text-2xl font-bold mb-6">Détail du rendez-vous</h1>

<div class="bg-white p-6 rounded shadow-md max-w-lg">
    <p><span class="font-semibold">Client :</span> {{ $appointment->client->nom }}</p>
    <p><span class="font-semibold">Date :</span> {{ \Carbon\Carbon::parse($appointment->date)->format('d/m/Y') }}</p>
    <p><span class="font-semibold">Heure :</span> {{ \Carbon\Carbon::parse($appointment->time)->format('H:i') }}</p>
    <p><span class="font-semibold">Description :</span> {{ $appointment->description ?? '-' }}</p>
    <p><span class="font-semibold">Statut :</span> {{ ucfirst($appointment->status) }}</p>

    <a href="{{ route('appointments.index') }}" class="inline-block mt-4 text-blue-600 hover:underline">Retour à la liste</a>
</div>
@endsection
