<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Client;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index()
    {
        $appointments = Appointment::with('client')->orderBy('date')->paginate(10);
        return view('appointments.index', compact('appointments'));
    }

    public function create()
    {
        $clients = Client::all();
        return view('appointments.create', compact('clients'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'client_id' => 'required|exists:clients,id',
            'date' => 'required|date',
            'time' => 'required',
            'description' => 'nullable|string',
            'status' => 'required|in:prévu,en attente,annulé,terminé',
        ]);

        Appointment::create($request->all());

        return redirect()->route('appointments.index')->with('success', 'Rendez-vous créé avec succès.');
    }

    public function show(Appointment $appointment)
    {
        return view('appointments.show', compact('appointment'));
    }

    public function edit(Appointment $appointment)
    {
        $clients = Client::all();
        return view('appointments.edit', compact('appointment', 'clients'));
    }

    public function update(Request $request, Appointment $appointment)
    {
        $request->validate([
            'client_id' => 'required|exists:clients,id',
            'date' => 'required|date',
            'time' => 'required',
            'description' => 'nullable|string',
            'status' => 'required|in:prévu,en attente,annulé,terminé',
        ]);

        $appointment->update($request->all());

        return redirect()->route('appointments.index')->with('success', 'Rendez-vous mis à jour.');
    }

    public function destroy(Appointment $appointment)
    {
        $appointment->delete();
        return redirect()->route('appointments.index')->with('success', 'Rendez-vous supprimé.');
    }
}
