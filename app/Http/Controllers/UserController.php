<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        // Ottieni tutti gli utenti dal database
        $users = User::all();
        
        // Mostra la vista con l'elenco degli utenti
        return view('users.index', compact('users'));
    }

    // Funzione che mostra la vista di modifica utente
    public function edit(User $user)
    {
        // Passa l'utente selezionato alla vista di modifica
        return view('users.edit', compact('user'));
    }
    
    // Funzione che registra l'utente
    public function update(Request $request, User $user)
    {
        // Usa direttamente l'oggetto $user passato
        if ($user->hasRole('admin') && User::role('admin')->count() == 1 && $request->role != 'admin') {
            return redirect()->back()->with('error', 'Non puoi cambiare il ruolo dell\'ultimo amministratore.');
        }
        
        // Valida l'input
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'role' => 'required'
        ]);
    
        // Aggiorna i dettagli dell'utente
        $user->update($request->only('name', 'email'));
    
        // Assegna il ruolo selezionato
        $user->syncRoles($request->role);
    
        // Reindirizza alla lista utenti
        return redirect()->route('users.index')->with('success', 'Utente aggiornato con successo!');
    }    

    // Funzione che mostra la pagina di creazione utente
    public function create()
    {
        return view('users.create');
    }

    // Funzione per creare un nuovo utente
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'role' => 'required',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user->assignRole($request->role);

        return redirect()->route('users.index')->with('success', 'Utente creato con successo.');
    }

    // Funzione per eliminare un utente
    public function destroy($id)
    {
        $user = User::find($id);
        if ($user->hasRole('admin') && User::role('admin')->count() == 1) {
            return redirect()->back()->with('error', 'Non puoi rimuovere l\'ultimo amministratore.');
        }

        $user->delete();
        return redirect()->route('users.index')->with('success', 'Utente eliminato con successo.');
    }
}