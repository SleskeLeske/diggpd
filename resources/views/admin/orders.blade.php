@extends('admin.layout.admin')
@section('content')
    <h3>{{$type}} @if(!$type) Alle Bestillinger @endif</h3>
    <hr>

    <ul>
      @foreach($orders as $order)
            <li>
                <h4>Bestilling av: <strong>{{$order->user->firstName}} {{$order->user->lastName}}</strong><br><br>
                  Pris:  <strong>{{$order->total}} kr</strong><br><br>
                Bestilling fullført: <strong>@if($order->delivered == 0)nei <i class="fa fa-times" aria-hidden="true"></i> @else ja <i class="fa fa-check" aria-hidden="true"></i> @endif</strong></h4>

                <form action="{{route('toggle.deliver', $order->id)}}" method="POST" class="pull-right" id="deliver-toggle">
                    {{csrf_field()}}
                    <label for="delivered">Delivered</label>
                    <input type="checkbox" value="1" name="delivered"  {{$order->delivered==1?"checked":"" }}>
                    <input type="submit" value="Submit">
                </form>

                <div class="clearfix"></div>
                <hr>
                <h5>Items</h5>
                <table class="table table-bordered">
                    <tr>
                        <th>Produkter</th>
                        <th>Mengde</th>
                        <th>Pris</th>
                        <th>Adresse</th>
                        <th>Sted</th>
                        <th>Post nr</th>
                        <th>Phone</th>
                    </tr>
                    @foreach($order->orderItems as $item)
                        <tr>
                            <td>{{$item->name}}</td>
                            <td>{{$item->pivot->qty}}</td>
                            <td>{{$item->pivot->total}}</td>
                    @endforeach
                            <td>{{$user->addressline}}</td>
                            <td>{{$user->place}}</td>
                            <td>{{$user->postnr}}</td>
                            <td>{{$user->phone}}</td>
                        </tr>


                </table>
            </li>

        @endforeach

    </ul>
@endsection
