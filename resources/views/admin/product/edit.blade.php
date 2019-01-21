@extends('admin.layout.admin')

@section('content')
<div class="createProductTitle text-center">
<h3>Oppdater produkt</h3>

</div>

  <div class="row">
    <div class="col-md-8 col-md-offset-2">

@if(Auth::user()->admin == 1)
    {!! Form::open(['route' => ['updateProductAdmin', $product->id], 'method' => 'post', 'files' => true]) !!}
       {!! csrf_field() !!}
    <div class="form-group">
      {{ Form::label('name', 'Name')}}
      {{ Form::text('name', null, array('class' => 'form-control', 'placeholder' => $product->name))}}
    </div>

    <div class="form-group">
      {{ Form::label('description', 'Description')}}
      {{ Form::text('description', null, array('class' => 'form-control', 'placeholder' => $product->description))}}
    </div>


    <div class="form-group">
      {{ Form::label('category_id', 'Categories')}}
        {{ Form::select('category_id',$categories, null, array('class' => 'form-control', 'placeholder' => $categoryName))}}
    </div>

    <div class="form-group">
      {{ Form::label('image', 'Image')}}
      {{ Form::file('image',array('class' => 'form-control'))}}
    </div>


    <div class="form-group">
      {{ Form::label('price', 'Price')}}
      {{ Form::text('price', null, array('class' => 'form-control', 'placeholder' => $product->price))}}
    </div>

    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
      Oppdater produkt
    </button>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Oppdater Produkt</h5>
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
                {{ Form::submit('Oppdater', array('class' => 'btn btn-default'))}}
          </div>
        </div>
      </div>
    </div>
    {!! Form::close() !!}
    @endif

  <!--  @if(Auth::user()->client == 1)
        {!! Form::open(['route' => ['updateProduct', $product->id], 'method' => 'post', 'files' => true]) !!}

        <div class="form-group">
          {{ Form::label('name', 'Name')}}
          {{ Form::text('name', null, array('class' => 'form-control', 'placeholder' => $product->name))}}
        </div>

        <div class="form-group">
          {{ Form::label('description', 'Description')}}
          {{ Form::text('description', null, array('class' => 'form-control', 'placeholder' => $product->description))}}
        </div>


        <div class="form-group">
          {{ Form::label('image', 'Image')}}
          {{ Form::file('image',array('class' => 'form-control'))}}
        </div>


        <div class="form-group">
          {{ Form::label('price', 'Price')}}
          {{ Form::text('price', null, array('class' => 'form-control', 'placeholder' => $product->price))}}
        </div>


    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
      Launch demo modal
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
        @endif
      </div> -->
  </div>
@endsection
