@extends('base')

@section('content')

@if($info = Session::get('info'))

<div class="card">
    <div class="card-body bg-success text-white">
        {{$info}}
    </div>
</div>

@endif

<div class="float-right">
    <a href="{{url('courses/create')}}" class="btn btn-warning">
        Add New Course
    </a>
</div>

    <h1 class="text-white">Courses</h1>
    <table class="table table-bordered table-secondary table-sm">
        <thead class="text-center">
            <th>Name</th>
            <th>Description</th>
            <th>Start</th>
            <th>End</th>
            <th>Instructor</th>
            <th>&nbsp;</th>
        </thead>
        <tbody>
            @foreach($courses as $c)

            <tr>
                <td>{{$c->name}}</td>
                <td>{{$c->description}}</td>
                <td>{{$c->start}}</td>
                <td>{{$c->end}}</td>
                <td>{{$c->instructor->user->lname}} , {{$c->instructor->user->fname}}</td>
                <td class="text-center">
                    <a href="{{ url('/courses/edit', ['id'=> $c]) }}" class="btn btn-info btn-lg">...</a>
                </td>
            </tr>

            @endforeach
        </tbody>
    </table>
@endsection
