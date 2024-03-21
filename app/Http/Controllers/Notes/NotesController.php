<?php

namespace App\Http\Controllers\Notes;

use App\Http\Controllers\Controller;
use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class NotesController extends Controller
{
    public function index(){
        return view('dashboard.notes.index');
    }

    public function getAllNote(){
        $userId = auth()->user()->id;

        $allNotes = Note::where('user_id',$userId)->get();

        return response()->json([
            "status"=>"success",
            "allNote"=>$allNotes
        ]);
    }

    public function store(Request $request)
{
    try {
        DB::beginTransaction();

        $userId = auth()->user()->id;

        $note = new Note();
        $note->title = $request->title;
        $note->description = $request->description;
        $note->user_id = $userId;
        $note->save();

        DB::commit();

        return response()->json([
            "status" => "success"
        ]);
    } catch (\Exception $e) {
        DB::rollBack();
        return response()->json([
            "status" => "error",
            "message" => $e->getMessage()
        ], );
    }
}

public function edit($id)
{
    try {

        $note = Note::find($id);
        return response()->json([
            "status" => "success",
            "note"   => $note
        ]);
    } catch (\Exception $e) {
        return response()->json([
            "status" => "error",
            "message" => $e->getMessage()
        ], );
    }
}

public function update(Request $request)
{
    try {
        DB::beginTransaction();

        $id = $request->noteId;
        $note = Note::find($id);
        $note->title = $request->title;
        $note->description = $request->description;
        $note->save();

        DB::commit();

        return response()->json([
            "status" => "success"
        ]);
    } catch (\Exception $e) {
        DB::rollBack();
        return response()->json([
            "status" => "error",
            "message" => $e->getMessage()
        ], );
    }
}

public function destroy($id)
{
    try {

        $note = Note::find($id);
        $note->delete();


        return response()->json([
            "status" => "success"
        ]);
    } catch (\Exception $e) {
        return response()->json([
            "status" => "error",
            "message" => $e->getMessage()
        ], );
    }
}

}
