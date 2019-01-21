@extends('admin.layout.admin')
@section('content')
    <h3>Admin</h3>
    @if($password = 123)
      <p>Passord er ikke endret fra oppstart. Vennligst endre og husk passord til fordel for sidens sikkerhet.</p>
      @endif

      {!! Form::open(['route' => 'admin.savePassword', 'method' => 'post' ]) !!}
         {!! csrf_field() !!}

         {{ Form::label('password', 'Innloggings Passord')}}
         {{ Form::password('password', null, array('class' => 'form-control'))}} <br><br>

         {{ Form::label('admin_password', 'Nytt admin passord')}}
         {{ Form::password('admin_password', null, array('class' => 'form-control'))}} <br><br><br>

            {{ Form::submit('Legg til', array('class' => 'btn btn-default'))}}

            {!! Form::close() !!}
@endsection
