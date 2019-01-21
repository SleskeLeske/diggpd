@extends('layouts.default')
@section('content')
<div class="container">
  <div class="row">
    <h3>Shipping Info</h3>

    {!! Form::open(['route' => 'user.storeAddress', 'method' => 'post']) !!}

    <div class="form-group">
      {{ Form::label('addressline', 'Adresse')}}
      {{ Form::text('addressline', null, array('class' => 'form-control'))}}
    </div>

    <div class="form-group">
      {{ Form::label('postnr', 'Post Nr')}}
      {{ Form::text('postnr', null, array('class' => 'form-control'))}}
    </div>

    <div class="form-group">
      {{ Form::label('place', 'Post Sted')}}
      {{ Form::text('place', null, array('class' => 'form-control'))}}
    </div>

    <div class="form-group">
      {{ Form::label('phone', 'Tlf Nr')}}
      {{ Form::text('phone', null, array('class' => 'form-control'))}}
    </div>


    <div class="form-group">
      {{ Form::submit('Til Betaling' ,array('class' => 'btn btn-default'))}}
      {!! Form::close() !!}
    </div>
    <div class="form-group">
      @include('includes.errors')
    </div>
    {!! Form::close() !!}

  </div>
</div>
@endsection
