@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto mt-10 p-6 bg-white rounded shadow">
    <h1 class="text-2xl font-bold mb-6">Modifier le client</h1>

    @if ($errors->any())
        <div class="mb-4 text-red-600">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>- {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('clients.update', $client) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')
        <div>
            <label for="nom" class="block font-semibold mb-1">Nom *</label>
            <input type="text" id="nom" name="nom" value="{{ old('nom', $client->nom) }}" required
                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-600">
        </div>
        <div>
            <label for="email" class="block font-semibold mb-1">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email', $client->email) }}"
                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-600">
        </div>
        <div>
            <label for="telephone" class="block font-semibold mb-1">Téléphone</label>
            <input type="text" id="telephone" name="telephone" value="{{ old('telephone', $client->telephone) }}"
                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-600">
        </div>
        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold px-6 py-2 rounded">
            Enregistrer
        </button>
    </form>
</div>
@endsection
