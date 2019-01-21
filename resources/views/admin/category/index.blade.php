@extends('admin.layout.admin')

@section('content')
<div class="container">
  <div class="row">
    <div class="navbar">
        <a class="navbar-brand" href="#">Kategorier:</a>
        <ul class="nav navbar-nav" style="">
            @if(!empty($categories))
            @forelse($categories as $category)
                <li class="active col-sm-3">
                    <a href="{{route('category.show',$category->id)}}">{{$category->name}}</a>
                    {{-- delete button --}}



                    <form action="{{route('category.destroy',$category->id)}}"  method="POST">
                        {{csrf_field()}}
                        {{method_field('DELETE')}}
                        <a class="btn btn-danger pull-right navbar-right" data-toggle="modal" data-target="#exampleModal-{{$category->id}}" href="#category">Slett</a>
                        <div class="modal fade" id="exampleModal-{{$category->id}}">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title">Slett kategori</h4>
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
                <li>No Items</li>
            @endforelse
                @endif

        </ul>



    <a class="btn btn-primary pull-right navbar-right" data-toggle="modal" href="#category">Add Category</a>
    <div class="modal fade" id="category">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Add New</h4>
                </div>
                  {!! Form::open(['route' => 'category.store', 'method' => 'post']) !!}
                <div class="modal-body">
                    <div class="form-group">
                        {{ Form::label('name', 'Kategori navn') }}
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
</div>

    {{--products--}}
    @if(isset($products))

    <h3>Products</h3>

    <table class="table table-hover">
    	<thead>
    		<tr>
    			<th>Products</th>
    		</tr>
    	</thead>
    	<tbody>
@forelse($products as $product)
    <tr><td>{{$product->name}}</td></tr>
    	@empty
        <tr><td>no data</td></tr>
        @endforelse

        </tbody>
    </table>
    @endif

@endsection
