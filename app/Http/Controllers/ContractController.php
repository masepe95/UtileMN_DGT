<?php

namespace App\Http\Controllers;

use App\Models\Contracts;
use Illuminate\Http\Request;

class ContractController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'file' => 'required|mimes:zip|max:20480'
        ]);

        // Gestisci l'upload del file
        if ($request->hasFile('file') && $request->file('file')->isValid()) {
            $filename = $request->file->store('contracts', 'public');
            $data['file_path'] = $filename; // Puoi salvare il percorso del file nel DB se necessario
        } else {
            return response()->json(['error' => 'Invalid file upload.'], 400);
        }

        $contract = Contracts::create($data);

        return response()->json(['message' => 'Contratto creato con successo!', 'contract' => $contract], 201);
    }
}
