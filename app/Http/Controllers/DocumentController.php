<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\DocumentStoreRequest;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $senaraiDokumen = DB::table('documents')
        // ->join('users', 'documents.user_id', '=', 'users.id')
        // ->select('documents.*', 'users.name AS user_name', 'users.email')
        // ->paginate(5);
        $senaraiDokumen = Document::with('user')->paginate(5);


        return view('folder-documents.index', ['senaraiDokumen' => $senaraiDokumen]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('folder-documents.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DocumentStoreRequest $request)
    {
        $data = $request->all();

        // DB::table('documents')->insert($data);
        // Cara 1
        // $document = new Document;
        // $document->user_id = auth()->id();
        // $document->name = $request->input('name');
        // $document->description = $request->input('description');
        // $document->save();
        if ($request->hasFile('fail'))
        {
            $fail = $request->file('fail');
            $fileName = 'test-' . $fail->getClientOriginalName();
            $pathDocument = $fail->storeAs('documents', $fileName, 'simpanan_uploaded');

            $data['fail'] = $fileName;
        }

        // Cara 2
        Document::create($data);

        return redirect()->route('documents.index')
        ->with('alert-success', 'Rekod berjaya disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Document $document)
    {
        return view('folder-documents.edit', compact('document'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DocumentStoreRequest $request, Document $document)
    {
        $data = $request->all();
        // $document = Document::findOrFail($id);
        $document->update($data);

        return back()->with('alert-success', 'Rekod berjaya dikemaskini');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Document $document)
    {
        $document->delete();

        return to_route('documents.index')->with('alert-success', 'Rekod berjaya dikemaskini');
    }
}
