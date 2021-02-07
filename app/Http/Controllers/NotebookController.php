<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Notebook;
use App\Note;
class NotebookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
       // $book = Notebook::all();
        $book = $user->notebook;
        return view('notebook.index',compact('book'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('notebook.create');
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
        'Name' => 'required|min:4|max:30',
        'notebook_image' => 'image|nullable|max:1999'

       ]);

         // Handle File Upload
         if($request->hasFile('notebook_image')){
            // Get filename with the extension
            $filenameWithExt = $request->file('notebook_image')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('notebook_image')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('notebook_image')->storeAs('public/notebook_images', $fileNameToStore);
		
        } else {
            $fileNameToStore = 'notebook.jpg';
        }

        $book = new Notebook();
        //$user = Auth::user();
        //$book = $user->notebook;
        $book->name = $request->input('Name');
        $book->user_id = auth()->user()->id;
        $book->image = $fileNameToStore;
        $book->save();
        return redirect('/notebook');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Notebook::find($id);
       // $notes = new Note();
        $notes = $book->notes;
        return view('notes.index',compact('book','notes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $book = Notebook::find($id);
        return view('notebook.edit')->with('book',$book);
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
            'Name' => 'required|min:4|max:30',
            'notebook_image' => 'image|nullable|max:1999'

    
           ]);
           
         // Handle File Upload
         if($request->hasFile('notebook_image')){
            // Get filename with the extension
            $filenameWithExt = $request->file('notebook_image')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('notebook_image')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('notebook_image')->storeAs('public/notebook_images', $fileNameToStore);
		
        }
        $book = Notebook::find($id);
        $book->name = $request->input('Name');

        if($request->hasFile('notebook_image')){
        $book->image = $fileNameToStore;
        }
        $book->save();
        return redirect('notebook');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Notebook::find($id);
        if($book->image != 'notebook.jpg'){
            Storage::delete('public/notebook_images/'.$book->image);
        }
        $book->delete();
       return redirect('notebook');
    }
}
