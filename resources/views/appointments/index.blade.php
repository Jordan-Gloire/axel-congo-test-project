@extends('layouts.app')

@section('title', 'Liste des rendez-vous')

@section('content')
<h1 class="text-2xl font-bold mb-6">Liste des rendez-vous</h1>

<table class="min-w-full bg-white rounded shadow overflow-hidden">
    <thead class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
        <tr>
            <th class="py-3 px-6 text-left">Client</th>
            <th class="py-3 px-6 text-left">Date</th>
            <th class="py-3 px-6 text-left">Heure</th>
            <th class="py-3 px-6 text-left">Description</th>
            <th class="py-3 px-6 text-left">Statut</th>
            <th class="py-3 px-6 text-center">Actions</th>
        </tr>
    </thead>
    <tbody class="text-gray-600 text-sm font-light">
        @forelse ($appointments as $appointment)
        <tr class="border-b border-gray-200 hover:bg-gray-100">
            <td class="py-3 px-6 text-left whitespace-nowrap">{{ $appointment->client->nom }}</td>
            <td class="py-3 px-6 text-left">{{ \Carbon\Carbon::parse($appointment->date)->format('d/m/Y') }}</td>
            <td class="py-3 px-6 text-left">{{ \Carbon\Carbon::parse($appointment->time)->format('H:i') }}</td>
            <td class="py-3 px-6 text-left">{{ $appointment->description ?? '-' }}</td>
            <td class="py-3 px-6 text-left capitalize">{{ $appointment->status }}</td>
            <td class="py-3 px-6 text-center space-x-2">
                <a href="{{ route('appointments.edit', $appointment) }}" class="text-yellow-500 hover:text-yellow-700 font-semibold">Modifier</a>
                <form action="{{ route('appointments.destroy', $appointment) }}" method="POST" class="inline-block" onsubmit="return confirm('Supprimer ce rendez-vous ?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-500 hover:text-red-700 font-semibold">Supprimer</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="6" class="text-center py-4 text-gray-500">Aucun rendez-vous trouvé.</td>
        </tr>
        @endforelse
    </tbody>
</table>

<div class="mt-4">
    {{ $appointments->links() }}
</div>
@endsection
