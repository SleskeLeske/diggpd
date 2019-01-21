@extends('admin.layout.admin')

@section('content')
<div class="createProductTitle text-center">
<h3>Legg til postnummer</h3>

</div>

  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <!-- ADMIN ADD PRODUCT-->


    {!! Form::open(['route' => 'admin.store.postnumber', 'method' => 'post', ]) !!}
       {!! csrf_field() !!}
    <div class="form-group">
      {{ Form::label('price', 'Price')}}
      {{ Form::text('price', null, array('class' => 'form-control'))}}
    </div>


<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Legg til postnummer
</button>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Admin Passord</h5>
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
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Lukk</button>
            {{ Form::submit('Legg til', array('class' => 'btn btn-default'))}}
      </div>
    </div>
  </div>
</div>

    {!! Form::close() !!}
</div>
</div>
