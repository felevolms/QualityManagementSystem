<?php

namespace App\Http\Controllers;

use App\Document;
use App\DocumentVersion;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $documents = Document::all();

        return view('documents.index', compact('documents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return view('documents.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Redirector
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|min:3',
            'document' => 'required|file'
        ]);

        $document = Document::create([
            'title' => $data['title'],
            'role_id' => 1 /* todo roles */
        ]);

        $path = $request->file('document')->store('documents');

        $newVersion = DocumentVersion::create([
            'url' => $path,
            'version' => 1,
            'document_id' => $document->id
        ]);

        return redirect('/documents')->with([
            'message' => 'Dodano nowy dokument'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param Document $document
     * @return View
     */
    public function show(Document $document)
    {
        $document->versions = $document->versions->sortByDesc('version');

        return view('documents.show', compact('document'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Document $document
     * @return View
     */
    public function edit(Document $document)
    {
        return view('documents.new-version', compact('document'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Document $document
     * @return Redirector
     */
    public function update(Request $request, Document $document)
    {
        $data = $request->validate([
            'document' => 'required|file'
        ]);

        $path = $request->file('document')->store('documents');

        $newVersion = DocumentVersion::create([
            'url' => $path,
            'version' => $document->getLatestVersion() + 1,
            'document_id' => $document->id
        ]);

        return redirect('/documents')->with([
            'message' => 'Dodano nową wersję dokumentu'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Document $document
     * @return Response
     */
    public function destroy(Document $document)
    {
        //
    }
}
