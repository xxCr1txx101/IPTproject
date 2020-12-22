@extends('base')

@section('content')

<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="deleteModalLabel">Delete Instructor</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        {!! Form::open(["url" => "/instructors/$instructor->id", 'method' => 'delete']) !!}
        <div class="modal-body">
            Are you sure you want to delete this instructor?
            {!! Form::hidden('instructor_id', $instructor->id) !!}
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-danger">Delete Instructor</button>
        </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>

    <h1>
        Edit Instructor {{$instructor->user->lname}}, {{$instructor->user->fname}}
    </h1>
    <div class="row">

        <div class="col-md-5">
            {!! Form::model($instructor, ['url'=>"/instructors/$instructor->id", 'method'=>'patch']) !!}

            @include('instructors._form')

            <div class="form-group">
                <button class="btn btn-primary">
                    Update Instructor
                </button>

                <button type="button" class="btn btn-danger float-right" data-toggle="modal" data-target="#deleteModal">
                    Delete Instructor
                </button>
            </div>

            {!! Form::close() !!}
        </div>
        
        <div class="col-md-7">
            @include('errors')
        </div>
    </div>
@endsection