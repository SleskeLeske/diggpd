@extends('admin.layout.admin')

@section('content')

<h2>Slett {{$user->firstName}} {{$user->lastName}}?</h2> <br>
<h5>Denne handlingen kan ikke reverseres</h5> <br>
    <a class="btn btn-danger" data-toggle="modal" data-target="#exampleModal-{{$user->id}}" href="#category">Slett {{$user->firstName}} {{$user->lastName}}</a>

<form action="{{route('admin.destroy.user', $user->id)}}"  method="POST">
    {{csrf_field()}}

    <div class="modal fade" id="exampleModal-{{$user->id}}">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Slett {{$user->firstName}} {{$user->lastName}}</h4>
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
@endsection
