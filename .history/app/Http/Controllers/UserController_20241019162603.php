<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        // Ottieni tutti gli utenti dal database
        $users = User::all();
        
        // Mostra la vista con l'elenco degli utenti
        return view('users.index', compact('users'));
    }

    public function edit(User $user)
    {
        // Passa l'utente selezionato alla vista di modifica
        return view('users.edit', compact('user'));
    }
    
    public function update(Request $request, User $user)
    {
        // Valida l'input
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'role' => 'required'
        ]);
    
        // Aggiorna i dettagli dell'utente
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
    
        // Assegna il ruolo selezionato
        $user->syncRoles($request->role);
    
        // Reindirizza alla lista utenti
        return redirect()->route('users.index')->with('success', 'Utente aggiornato con successo!');
    }    
}