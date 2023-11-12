<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNotesRequest;
use App\Http\Requests\UpdateNotesRequest;
use App\Models\Notes;
use Illuminate\Http\Request;

class NotesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notes = Notes::where('user_id', session('user_id'))->get();
        return view('notes', [
            'notes' => $notes,
        ]);
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
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string|max:255'
        ]);

        Notes::create([
            'user_id' => session('user_id'),
            'title' => $data['title'],
            'content' => $data['content']
        ]);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function detail($id)
    {
        //
        $note = Notes::find($id);
        $notes = Notes::where('user_id', session('user_id'))->get();
        return view('edit', [
            'note' => $note,
            'notes' => $notes,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id)
    {
        //
        $data = $request->validate([
            'title' => 'required|min:3|string',
            'content' => 'required|string'
        ]);

        $note = Notes::find($id);
        $note->update([
            'title' => $data['title'],
            'content' => $data['content']
        ]);

        return redirect('/');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $note = Notes::find($id);
        $note->delete();

        return redirect('/');
    }
}
