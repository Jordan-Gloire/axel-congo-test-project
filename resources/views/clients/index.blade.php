@extends('layouts.app')

@section('content')
<div class="container mx-auto px-6 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold">Liste des clients</h1>
        <a href="{{ route('clients.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded">
            Ajouter un client
        </a>
    </div>

    @if(session('success'))
        <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif

    @if($clients->isEmpty())
        <p class="text-gray-600">Aucun client trouvé.</p>
    @else
        <table class="w-full table-auto border-collapse border border-gray-300 rounded">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border border-gray-300 px-4 py-2 text-left">Nom</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Email</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Téléphone</th>
                    <th class="border border-gray-300 px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($clients as $client)
                <tr class="hover:bg-gray-50">
                    <td class="border border-gray-300 px-4 py-2">{{ $client->nom }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $client->email ?? '-' }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $client->telephone ?? '-' }}</td>
                    <td class="border border-gray-300 px-4 py-2 text-center space-x-2">
                        <a href="{{ route('clients.edit', $client) }}" class="text-blue-600 hover:underline">Modifier</a>
                        <form action="{{ route('clients.destroy', $client) }}" method="POST" class="inline-block" onsubmit="return confirm('Supprimer ce client ?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline">Supprimer</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
