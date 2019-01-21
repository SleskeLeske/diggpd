@extends('admin.layout.admin')

@section('content')

    <h3>Post numre</h3>

<div class="container">
      <div class="row">
        <ul style="list-style:none;" class="postnumbers">
          @forelse($postnumbers as $postnumber)
              <li class="active col-sm-3">
                  {{-- delete button --}}
                  <h5 style="float:left;">{{$postnumber->name}}</h5>


                  <form action="{{route('postnr.destroy',$postnumber->id)}}"  method="POST">
                      {{csrf_field()}}
                      {{method_field('DELETE')}}
                      <a style="float:right;" class="btn btn-danger pull-right navbar-right" data-toggle="modal" data-target="#exampleModal-{{$postnumber->id}}" href="#category">Slett</a>
                      <div class="modal fade" id="exampleModal-{{$postnumber->id}}">
                          <div class="modal-dialog">
                              <div class="modal-content">
                                  <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                      <h4 class="modal-title">Slett postnummer</h4>
                                  </div>
                                            <div class="modal-body">

                                            <div class="form-group">
                                              {{ Form::label('adminPassword', 'Passord')}}
                                              {{ Form::password('adminPassword', null, array('class' => 'form-control'))}}
                                            </div>

                                            </div>
                                            <div class="modal-footer">
                                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Lukk</button>
                                                  {{ Form::submit('Slett', array('class' => 'btn btn-default'))}}
                                            </div>
                                          </div>
                                        </div>
                                      </div>

                   </form>






              </li>
          @empty
              <h3>Ingen registrerte postnumre</h3>
          @endforelse
        </ul>


        <a style="position:relative; right:50%; margin-top:100px;" class="btn btn-primary pull-right navbar-right" data-toggle="modal" href="#category">Legg til postnummer</a>
        <div class="modal fade" id="category">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Legg til postnummer</h4>
                    </div>
                      {!! Form::open(['route' => 'postnr.store', 'method' => 'post']) !!}
                                            {{csrf_field()}}
                    <div class="modal-body">
                        <div class="form-group">
                            {{ Form::label('name', 'Postnummer') }}
                            {{ Form::text('name', null, array('class' => 'form-control')) }}
                        </div>
                        <div class="form-group">
                          {{ Form::label('adminPassword', 'Admin Passord')}}
                          {{ Form::text('adminPassword', null, array('class' => 'form-control'))}}
                        </div>
                        {{ Form::submit('Legg til', array('class' => 'btn btn-default'))}}
                    </div>
                    {!! Form::close() !!}
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->


        </div>

      </div>


  @endsection
