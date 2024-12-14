<?php

namespace App\Http\Controllers;  // Sagt Laravel, wo der Controller zu finden ist

use Illuminate\Http\Request; // Importiert die Request-Klasse für Formulardaten
use App\Models\Message;


class SimpleController extends Controller
{
    // Diese Funktion wird aufgerufen, wenn jemand die Hauptseite besucht
    public function index(){
        $messages = Message::orderBy("created_at","desc")->get();
        return view("welcome", ['messages'=>$messages]); // Zeigt die welcome.blade.php an
        }


     // Diese Funktion wird aufgerufen, wenn das Formular abgeschickt wird
    public function submit(Request $request)
        {
            $validateData = $request->validate([
                'message'=> 'required|max:255',
                'author' => 'nullable|max:100'
            ]);

            Message::create($validateData);


    return redirect()->back()->with('success', 'Datensatz wurde erfolgreich gespeichert!'); // Leitet zurück zur vorherigen Seite mit einer Erfolgsmeldung
        }

    public function debug() {
        $messages = Message::all();

        dd([
            'Anzahl von nachrichten' => $messages->count(),
            'Alle Nachrichten' => $messages->toArray()
        ]);

           }

          // Suchfunktion
    public function search(Request $request)
    {
        $request->validate([
            'query' => 'required|string|min:3', // Validierung des Suchbegriffs
        ]);

        $query = $request->input('query');

        // Suche nach Nachrichten, die den Suchbegriff enthalten
        $results = Message::where('content', 'like', '%' . $query . '%')->get();

        // Zeige die Ergebnisse in einer Blade-Ansicht an
        return view('messages.search_results', compact('results', 'query'));
    }

}



