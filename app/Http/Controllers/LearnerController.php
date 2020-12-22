<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Learner;

class LearnerController extends Controller
{
    public function index() {

        $learners = Learner::get();

        return view('learners.index', compact('learners'));
    }

    public function create() {

        return view('learners.create');
    }

    public function store(Request $request) {

        $this->validate($request, [
            'user_id' => 'required|numeric',
            'level' => 'required',
            'status' => 'required',
        ]);

        Learner::create($request->all());

        return redirect('/learners')->with('info', 'A new learner has been created.');
    }

    public function edit(Learner $learner) {
        return view('learners.edit', compact('learner'));
    }

    public function update(Learner $learner, Request $request) {
        
        $this->validate($request, [
            'user_id' => 'required|numeric',
            'level' => 'required',
            'status' => 'required',
        ]);

        $learner->update($request->all());

        return redirect('/learners')->with('info', "The record of " . $learner->user->fname . ", " . $learner->user->lname . " has been updated.");
    }

    public function destroy(Learner $learner, Request $request) {

        $name = $learner->user->lname . ", " . $learner->user->fname;

        $learner->delete();
        
        return redirect("/learners")->with('info', "The record of learner $name has been deleted");
    }
}
