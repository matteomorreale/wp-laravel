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
}