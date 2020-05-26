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
            'message' => 'Added a document'
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
        return view('documents.show', compact('document'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Document $document
     * @return Response
     */
    public function edit(Document $document)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Document $document
     * @return Response
     */
    public function update(Request $request, Document $document)
    {
        //
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
