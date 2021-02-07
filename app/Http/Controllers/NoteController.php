<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Note;
use App\Notebook;
class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   /*public function index()
    {
        $note = Note::all();
        $book = new Notebook();
        return view('notes.index',compact('note','book'));
    }*/

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function create()
    {
        //$book= new Notebook();
       // return view('notes.create')->with('id',$book->id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|min:4|max:30',
            'body'  => 'required|min:10|max:60'
    
           ]);


        $note = new Note();
        $book = new Notebook();
       // $notebookId = new Notebook();

        $note->title = $request->input('title');
        $note->body =  $request->input('body'); 
        $NotebookId = $note->notebook_id = $request->notebookId;
       // $NotebookId = $request->notebookId;
        $note->save();
        return redirect()->route('notebook.show', ['notebook' => $NotebookId ]);
        //To send the notebookId to the the nobook.show i use the last method route with this parameter
        //The notebook.show route is notebook/{notebook} so i use the same name up of {notebook}
      
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $note = Note::find($id);
        return view('notes.show',compact('note'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $note = Note::find($id);
        return view('notes.edit',compact('note'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|min:4|max:30',
            'body'  => 'required|min:10|max:60'
    
           ]);

        $note = Note::find($id);
        $note->title = $request->input('title');
        $note->body =  $request->input('body');
        $NotebookId = $request->notebookId;
        $note->save();
        return redirect()->route('notebook.show', ['notebook' => $NotebookId ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $note = Note::find($id);
        $note->delete();
      //  return redirect()->route('notebook.show');
        return back();
        
    }

    public function createNote($notebookId)
    {
        
        return view('notes.create')->with('id',$notebookId);
    }
}
