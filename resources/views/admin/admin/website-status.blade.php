@extends('admin.layout.admin')
@section('content')
    <h3>Admin</h3>

    <div class="website-status">
      <h3>Nettside status:</h3>
      @if($admin->website_status == 1)
        <h1>Nettsiden er aktiv</h1>
       @else
        <h1>Nettsiden er nede</h1>

      @endif
      <div class="status-checkbox">
        <div class="form-group">
              {!! Form::open(['route' => ['admin.website-status.toggle'], 'method' => 'post']) !!}
          {{ Form::label('website_status', 'Nettside status')}}
          {{ Form::hidden('website_status', '0', array('class' => 'form-control')) }}
          {{ Form::checkbox('website_status', '1', array('class' => 'form-control'))}}
        </div>

        <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
      Endre side-status
    </button>

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
      </div>
    </div>
@endsection
