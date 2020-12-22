<div class="form-group">
    {{Form::label('user_id', 'Select User')}}
    {{Form::select('user_id', \App\User::list(), null, ['class'=>'form-control', 'placeholder'=>'Select User'])}}
</div>

<div class="form-group">
    {{Form::label('level', 'Level')}}
    {{Form::select('level', ['Novice' => 'Novice',
    'Intermediate' => 'Intermediate',
    'Advanced' => 'Advanced',
    ], null, ['class'=>'form-control', 'placeholder'=>'Select level'])}}
</div>

<div class="form-group">
    {{Form::label('status', 'Status')}}
    {{Form::select('status', ['Active' => 'Active', 
    'Inactive' => 'Inactive', 
    'Suspended' => 'Suspended',
    ], null, ['class'=>'form-control', 'placeholder'=>'Select status'])}}
</div>