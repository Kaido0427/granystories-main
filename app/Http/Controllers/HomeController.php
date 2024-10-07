<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Dompdf\Dompdf;
use Dompdf\Options;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function lecture(Request $request)
    {
        // Validation des champs email et mot de passe
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Tentative de connexion
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Auth::attempt() a réussi, rediriger vers la page d'accueil
            return redirect()->intended('/');
        } else {
            // Auth::attempt() a échoué, rediriger vers la page de connexion avec un message d'erreur
            return back()->withErrors([
                'email' => 'Les informations d\'identification ne correspondent pas à nos enregistrements.',
            ])->withInput($request->except('password'));
        }
    }


    public function generatePDF()
    {
        // Configuration de DOMPDF
        $options = new Options();
        $options->set('isRemoteEnabled', true); // Pour autoriser les images externes
        $dompdf = new Dompdf($options);

        // Sélection des éléments avec la classe .front dans les sections .paper
        // Charger la vue pour générer le contenu HTML, puis manipuler le contenu
        $html = view('pdfbook')->render();

        // Utilisation de DOMDocument pour manipuler le HTML et extraire le contenu .front
        $dom = new \DOMDocument();
        @$dom->loadHTML($html); // Load HTML content from the view

        // Utiliser XPath pour sélectionner les éléments .front dans les .paper
        $xpath = new \DOMXPath($dom);
        $frontElements = $xpath->query('//div[contains(@class, "paper")]//div[contains(@class, "front")]');

        // Créer une chaîne HTML à partir des éléments sélectionnés
        $content = '';
        foreach ($frontElements as $element) {
            $content .= $dom->saveHTML($element);
        }

        // Charger uniquement le contenu des éléments .front dans DOMPDF
        $dompdf->loadHtml($content);

        // Optionnel: ajuster la taille et l'orientation de la page
        $dompdf->setPaper('A4', 'portrait');

        // Rendre le PDF
        $dompdf->render();

        // Téléchargement ou affichage dans le navigateur
        return $dompdf->stream('livre.pdf', ['Attachment' => false]);  // 'Attachment' => true pour télécharger
    }
}
