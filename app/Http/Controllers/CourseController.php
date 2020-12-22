<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;

class CourseController extends Controller
{
    public function index() {
        $courses = Course::get();

        return view('courses.index', compact('courses'));
    }

    public function create() {
        return view('courses.create');
    }

    public function store(Request $request) {
        
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'start' => 'required|date',
            'end' => 'required|date',
            'tags' => 'required',
            'instructor_id' => 'required|numeric',
        ]);

        Course::create($request->all());

        return redirect('/courses')->with('info', 'New course has been created.');
    }

    public function edit(Course $course) {
        return view('courses.edit', compact('course'));
    }

    public function update(Course $course, Request $request) {

        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'start' => 'required|date',
            'end' => 'required|date',
            'tags' => 'required',
            'instructor_id' => 'required|numeric',
        ]);

        $course->update($request->all());

        return redirect('/courses')->with('info', "The course " . $course->name . " has been updated.");
    }

    public function destroy(Course $course, Request $request) {

        $name = $course->name;

        $course->delete();

        return redirect("/courses")->with('info', "The course $name has been deleted");
    }
}
