<?php

namespace App\Http\Controllers;

use App\Models\SelectModel;
use App\Models\SubjectModel;
use Illuminate\Http\Request;
use Inertia\Inertia;

class EmdfhrController extends Controller
{
    public function index() {
        return Inertia::render('emdfhr/Emdfhr');
    }
    public function create(Request $req) {
        $subject_models = new SubjectModel();
        $subject_models->name = $req->title;
        $subject_models->content = $req->content;
        $subject_models->score = $req->score;
        $subject_models->save();

        return $subject_models;
    }

    public function list() {
        $subject_models = SubjectModel::orderBy('id', 'desc')->paginate(3);
        return Inertia::render('emdfhr/SubjectList', ['subjects' => $subject_models]);
    }

    public function show($id) {
        $subject = SubjectModel::find($id);
        return Inertia::render('emdfhr/SubjectShow', ['subject' => $subject]);
    }

    public function redirectEdit($id) {
        return Inertia::render('emfhr/EditPage', ['id' => $id]);
    }

    public function edit(Request $req, $id) {
        $subject = SubjectModel::find($id);
        $subject->name = $req->title;
        $subject->content = $req->content;
        $subject->score = $req->score;
        $subject->save();
        return $subject;
    }

    public function delete($id) {
        $subject = SubjectModel::find($id);
        $subject->delete();

        return ;
    }

    public function sinchung(Request $req) {
        $user_id = auth()->user()->id;

        $select = new SelectModel();
        $select -> user_id = $user_id;
        $select -> subject_models_id = $req -> id;
        $select -> save();
        return $select;
    }

    public function cls(Request $req) {
        $user_id = auth()->user()->id;
        $select = SelectModel::where('user_id', $user_id)->where('subject_models_id', $req->id)
        ->delete();

        return ;
    }

    public function state(Request $req) {
        $user_id = auth()->user()->id;
        $select = SelectModel::where('user_id', $user_id)->where('subject_models_id', $req->id)
        ->get();

        if($select) {
            return true;
        } else {
            return false;
        }
    }
}
