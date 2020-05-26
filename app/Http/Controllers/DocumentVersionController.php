<?php

namespace App\Http\Controllers;

use App\DocumentVersion;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class DocumentVersionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param DocumentVersion $documentVersion
     * @return Response
     */
    public function show(DocumentVersion $documentVersion)
    {
        $url = $documentVersion->url;
        $extension = File::extension($url);
        $name = $documentVersion->document->title . '_v' . $documentVersion->version . '.' . $extension;

        return Storage::download($url, $name);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param DocumentVersion $documentVersion
     * @return Response
     */
    public function edit(DocumentVersion $documentVersion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param DocumentVersion $documentVersion
     * @return Response
     */
    public function update(Request $request, DocumentVersion $documentVersion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DocumentVersion $documentVersion
     * @return Response
     */
    public function destroy(DocumentVersion $documentVersion)
    {
        //
    }
}
