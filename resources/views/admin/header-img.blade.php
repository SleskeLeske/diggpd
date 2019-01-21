@extends('admin.layout.admin')
@section('content')
<div class="row">
  <div class="col-md-8 col-md-offset-2">

    <div><a href="{{route('client.destroyHeaderImg', $id)}}"><i class="fas fa-times"></i></a>
      <img style="width:100px; height:100px;" src="{{url('img', $clientheaderimg)}}" alt=""></div>


  {!! Form::open(['route' => 'client.saveHeaderImg', 'method' => 'post', 'files' => true]) !!}

  <div class="form-group">
    {{ Form::label('image', 'Image')}}
    {{ Form::file('image',array('class' => 'form-control'))}}
  </div>

  {{ Form::submit('Create', array('class' => 'btn btn-default'))}}
  {!! Form::close() !!}
      </div>
</div>
@endsection
