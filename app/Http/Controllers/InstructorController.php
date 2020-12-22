<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Instructor;

class InstructorController extends Controller
{
    public function index() {

        $instructors = Instructor::get();

        return view('instructors.index', compact('instructors'));
    }

    public function create() {
        return view('instructors.create');
    }

    public function store(Request $request) {

        $this->validate($request, [
            'user_id' => 'required|numeric',
            'aoe' => 'required',
            'rating' => 'required|numeric',
        ]);

        Instructor::create($request->all());

        return redirect('/instructors')->with('info', 'A new instructor has been created.');
    }


    public function edit(Instructor $instructor) {    
        return view('instructors.edit', compact('instructor'));  
    }

    
    public function update(Instructor $instructor, Request $request) {
        $this->validate($request, [
            'aoe' => 'required',
            'rating' => 'required|numeric',
        ]);

        $instructor->update($request->all());
        
        return redirect('/instructors')->with('info', "The record of " . $instructor->user->lname . ", " . $instructor->user->fname . " has been updated.");
    }

    public function destroy(Instructor $instructor, Request $request) {
        $name = $instructor->user->lname . ", " . $instructor->user->fname;

        $instructor->delete();

        return redirect("/instructors")->with('info', "The record of instructor $name has been deleted");
    }
}
