<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    // Afficher la liste des clients
    public function index()
    {
        $clients = Client::all();
        return view('clients.index', compact('clients'));
    }

    // Afficher le formulaire de création d'un client
    public function create()
    {
        return view('clients.create');
    }

    // Enregistrer un nouveau client en base
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'email' => 'nullable|email|unique:clients,email',
            'telephone' => 'nullable|string|max:20',
        ]);

        Client::create($request->all());

        return redirect()->route('clients.index')->with('success', 'Client ajouté avec succès.');
    }

    // Afficher un client (optionnel)
    public function show(Client $client)
    {
        return view('clients.show', compact('client'));
    }

    // Afficher le formulaire d'édition (optionnel)
    public function edit(Client $client)
    {
        return view('clients.edit', compact('client'));
    }

    // Mettre à jour un client (optionnel)
    public function update(Request $request, Client $client)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'email' => 'nullable|email|unique:clients,email,'.$client->id,
            'telephone' => 'nullable|string|max:20',
        ]);

        $client->update($request->all());

        return redirect()->route('clients.index')->with('success', 'Client modifié avec succès.');
    }

    // Supprimer un client (optionnel)
    public function destroy(Client $client)
    {
        $client->delete();

        return redirect()->route('clients.index')->with('success', 'Client supprimé avec succès.');
    }
}
