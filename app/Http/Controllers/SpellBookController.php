<?php

namespace App\Http\Controllers;

use App\Models\SpellBook;
use App\Http\Requests\StoreSpellBookRequest;
use App\Http\Requests\UpdateSpellBookRequest;
use App\Http\Requests\UploadSpellBookRequest;
use Illuminate\Support\Facades\Log;

use Barryvdh\DomPDF\PDF;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SpellBookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $spellbooks = SpellBook::all();
        return view('spellbook.index', compact('spellbooks'));
    }
    /**
     * upload a spellbook
     *
     * @return void
     */
    public function upload(UploadSpellBookRequest $request, SpellBook $spellBook)
    {
        // Update file if a new one is provided
        if ($request->hasFile('file')) {
            $spellBookFile = $request->file('file');
            $spellbookName = time() . '-' . $spellBookFile->getClientOriginalName();
            $spellbookPath = $spellBookFile->storeAs('public' . DIRECTORY_SEPARATOR . 'spellbooks', $spellbookName);
            $parser = new \Smalot\PdfParser\Parser();



            $pdf = $parser->parseFile(storage_path('app' . DIRECTORY_SEPARATOR . $spellbookPath));
            // echo $fileContents;

            $spellBookContent = $pdf->getText();
            // dd($spellBookContent,  $spellbookPath,  $spellbookName);

            $spellBook->create([
                'file_name' => $spellbookName,
                'file_path' => $spellbookPath,
                'content' => $spellBookContent,
            ]);

            // Redirect back to the index page
            return redirect()->route('spellbooks.index')->with(
                'succes',
                'PDF upload and content stored succesfully'
            );
        }
        // Handle case when no file is provided
        return redirect()->route('spellbooks.index')->with(
            'error',
            'No file provided for upload'
        );

        // return redirect()->route('spellbooks.index');
        // return redirect()->route('spellbooks.index')->with(['pdfText' => $pdfText, 'success' => 'PDF uploaded successfully']);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSpellBookRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(SpellBook $spellBook): JsonResponse
    {
        //
        $fileContent = $spellBook->content;
        $filePath = $spellBook->file_path;
        return response()->json(['fileContent' => $fileContent, 'filePath' => $filePath]);
        // return view('show', compact('spellBook'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $spellBook = SpellBook::find($id);
        // dd($spellBook);
        return view('spellbook.edit', compact('spellBook'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSpellBookRequest $request, SpellBook $spellBook)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id): RedirectResponse
    {

        $spellBook = SpellBook::find($id);
        if ($spellBook) {


            $filePath = $spellBook->file_path;

            // Delete the file from local storage using Storage facade
            if (Storage::exists($filePath)) {
                Storage::delete($filePath);
            }


            $spellBook->delete();

            // Redirect back to the index page
            return redirect()->route('spellbooks.index')->with(
                'succes',
                'PDF Deleted Successfully'
            );
        }

        // Handle case when no file is provided
        return redirect()->route('spellbooks.index')->with(
            'error',
            'PDF not found'
        );
    }
}
