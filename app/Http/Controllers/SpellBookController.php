<?php

namespace App\Http\Controllers;

use App\Models\SpellBook;
use App\Http\Requests\StoreSpellBookRequest;
use App\Http\Requests\UpdateSpellBookRequest;
use App\Http\Requests\UploadSpellBookRequest;

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
    public function upload(UploadSpellBookRequest $request)
    {
        $spellbookPath = $request->file('pdf')->store('pdfs');

        SpellBook::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'file_path' => $spellbookPath,
        ]);
        return redirect('/');
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
    public function show(SpellBook $spellBook)
    {
        //
        return view('show', compact('spellBook'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SpellBook $spellBook)
    {
        //
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
    public function destroy(SpellBook $spellBook)
    {
        //
    }
}
