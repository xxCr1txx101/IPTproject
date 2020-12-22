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
    <a href="{{url('instructors/create')}}" class="btn btn-warning">
        Add New Instructor
    </a>
</div>

<h1 class="text-white">Instructors</h1>

<table class="table table-bordered table-secondary table-sm">
    <thead class="text-center">
        <th>ID#</th>
        <th>Last Name</th>
        <th>First Name</th>
        <th>Expertise</th>
        <th>&nbsp;</th>
    </thead>
    <tbody>
        @foreach($instructors as $i)

        <tr>
            <td>{{$i->id}}</td>
            <td>{{$i->user->lname}}</td>
            <td>{{$i->user->fname}}</td>
            <td>{{$i->aoe}}</td>
            <td class="text-center">
                <a href="{{url('/instructors/edit', ['id'=> $i])}}" class="btn btn-info btn-lg">...</a>
            </td>
        </tr>

        @endforeach
    </tbody>
</table>

@stop
