@extends('admin.layout.admin')

@section('content')

    <h3>Products</h3>

<div class="container">
      <div class="row">
    @forelse($products as $product)

       <div class="admin-product col-md-3 col-sm-6">
        <h5>Produkts navn: {{$product->name}}</h5>
        <hr>
        @if($product->category)<h5>Kategori: {{count($product->category)?$product->category->name: "N/A"}}</h5>@endif
        <hr>
        <h6>Produktbeskrivelse: {{$product->description}}</h6>
        <hr>
        <h5>Produkt pris: {{$product->price}}</h5>
        <hr>
        <h5>Antall ganger solgt: {{$product->times_bought}}</h5>
        <img src="{{url('img', $product->image)}}">

            <br>
          <a href="{{route('editProductAdmin',$product->id)}}" class="btn btn-primary btn-sm ">Rediger produkt</a>
            <br>

        <form action="{{route('product.destroy',$product->id)}}"  method="POST">
           {{csrf_field()}}
           {{method_field('DELETE')}}

           <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal-{{$product->id}}">
             Slett
           </button>

           <div class="modal fade" id="exampleModal-{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
             <div class="modal-dialog" role="document">
               <div class="modal-content">
                 <div class="modal-header">
                   <h5 class="modal-title" id="exampleModalLabel">Admin passord</h5>
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
                       {{ Form::submit('Slett', array('class' => 'btn btn-default'))}}
                 </div>
               </div>
             </div>
           </div>
         </form>
    </div>

        @empty

        <h3>No products</h3>

    @endforelse
</div>
</div>

@endsection
