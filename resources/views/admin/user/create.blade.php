@extends('admin.layout.admin')

@section('content')
<div class="createProductTitle text-center">
<h3>Legg til bruker</h3>

</div>

  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <!-- ADMIN ADD PRODUCT-->
@if(Auth::check() && Auth::user()->admin == 1)

    {!! Form::open(['route' => 'admin.user.save', 'method' => 'post']) !!}

    <div class="form-group">
      {{ Form::label('email', 'Email')}}
      {{ Form::text('email', null, array('class' => 'form-control'))}}
    </div>

    <div class="form-group">
      {{ Form::label('firstName', 'Fornavn')}}
      {{ Form::text('firstName', null, array('class' => 'form-control'))}}
    </div>

    <div class="form-group">
      {{ Form::label('lastName', 'Etternavn')}}
      {{ Form::text('lastName', null, array('class' => 'form-control'))}}
    </div>

    <div class="form-group">
      <label for="password">Passord:</label>
      <input type="password" class="form-control" id="password" name="password" value="password">
    </div>

    <div class="form-group">
      {{ Form::label('admin', 'Admin status')}}
      {{ Form::checkbox('admin', '1', array('class' => 'form-control'))}}
    </div>

    <div class="form-group">
      {{ Form::label('driver', 'Sjåfør status')}}
      {{ Form::checkbox('driver', '1', array('class' => 'form-control'))}}
    </div>

    <div class="form-group">
      {{ Form::label('client', 'Klient status')}}
      {{ Form::checkbox('client', '1', array('class' => 'form-control'))}}
    </div>

        <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
      Legg til bruker
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">

          <div class="form-group">
            {{ Form::label('adminPassword', 'Passord')}}
            {{ Form::password('adminPassword', null, array('class' => 'form-control'))}}
          </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                {{ Form::submit('Create', array('class' => 'btn btn-default'))}}
          </div>
        </div>
      </div>
    </div>


    {!! Form::close() !!}

@endif
@endsection
