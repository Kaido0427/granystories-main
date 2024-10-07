<?php

namespace App\Http\Controllers;

use App\Models\anecdote;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log; 

class AnecdoteController extends Controller
{
    public function index() 
    {
        $anecdotes = Anecdote::all();
        return view('anecdotes.index', compact('anecdotes'));
    }

    public function create()
    {

        return view('anecdotes.create');
    }

    public function store(Request $request) 
    {
        Log::info('Début de la fonction store');

        try {
            Log::info('Données reçues:', $request->all());

            $validatedData = $request->validate([
                'nom' => 'required|string|max:255',
                'prenom' => 'required|string|max:255',
                'relation' => 'required|string|max:255',
                'ville' => 'required|string|max:255',
                'pays' => 'required|string|max:255',
                'anecdote' => 'required|string|max:20000',
            ]);

            Log::info('Données validées:', $validatedData);

            $anecdote = Anecdote::create($validatedData);

            return redirect()->route('anecdote.show', ['id' => $anecdote->id])
                ->with('success', 'Anecdote soumise avec succès.');
        } catch (\Exception $e) {
            Log::error('Erreur lors de la création de l\'anecdote:', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return redirect()->back()->with('error', 'Une erreur est survenue lors de la soumission de l\'anecdote. Veuillez réessayer.');
        }
    }
 
    public function update(Request $request, $id) 
{
    Log::info('Début de la fonction update');

    try {
        Log::info('Données reçues:', $request->all());

        // Validation des données
        $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'relation' => 'required|string|max:255',
            'ville' => 'required|string|max:255',
            'pays' => 'required|string|max:255',
            'anecdote' => 'required|string|max:20000',
        ]);

        Log::info('Données validées:', $validatedData);

        // Trouver l'anecdote par ID
        $anecdote = Anecdote::findOrFail($id);

        // Mettre à jour l'anecdote
        $anecdote->update($validatedData);

        return redirect()->route('anecdote.show', ['id' => $anecdote->id])
            ->with('success', 'Anecdote mise à jour avec succès.');
    } catch (\Exception $e) {
        Log::error('Erreur lors de la mise à jour de l\'anecdote:', [
            'message' => $e->getMessage(),
            'trace' => $e->getTraceAsString()
        ]);

        return redirect()->back()->with('error', 'Une erreur est survenue lors de la mise à jour de l\'anecdote. Veuillez réessayer.');
    }
}

    public function show(Request $request, $id)
    {
        $anecdote = Anecdote::findOrFail($id);
        return view('anecdotes.show', compact('anecdote'));
    }

    public function getAnecdotes()
    {
        $anecdotes = Anecdote::orderBy('created_at', 'asc')->get();

        return response()->json($anecdotes);
    }

    public function generatePdf()
    { 
        // Les données que tu veux passer à la vue
        $data = [
            'anecdotes' => [
                // Ajouter ici les anecdotes dynamiques
            ],  
        ];

        // Générer le PDF en utilisant la vue book-pdf
        $pdf = FacadePdf::loadView('book-pdf', $data);

        // Retourner le PDF pour téléchargement
        return $pdf->download('book.pdf');
    }

    
}
