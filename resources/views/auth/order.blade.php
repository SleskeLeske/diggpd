@extends('layouts.default')
@section('content')
    <hr>
<div class="container">
    <ul style="padding: 0;">
      @forelse($orders as $order)
            <li style="list-style-type: none;">

                        <ul>
                          <li style="display:inline; margin: 10px;">
                            Pris:  <strong>{{$order->total}} kr</strong>
                        </li>
                        <li style="display:inline; margin: 10px;">
                          Ordertype: @if($order->type == 0) <strong>Hurtigkjøp</strong> @else <strong>Dagskjøp</strong> @endif
                        </li>
                        <li style="display:inline; margin: 10px;">
                          Navn: <strong>{{$user->firstName}} </strong>
                        </li>
                        <li style="display:inline; margin: 10px;">
                          Bestilt: <strong>{{$order->created_at}}</strong>
                        </li>
                      </ul>


                <div class="clearfix"></div>
                <hr>
                <table class="table table-bordered">
                    <tr>
                        <th>Produkter</th>
                        <th>Mengde</th>
                        <th>Pris</th>
                        <th>Adresse</th>
                        <th>Sted</th>
                        <th>Post nr</th>
                        <th>Tlf nr</th>

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
                            <td></td>
                        </tr>


                </table>
            </li>




    </ul>
    @empty
    <div class="row">
      <div class="text-center no-order-wrapper">
        <h1>Ingen ordre</h1>
        <h6>Du har ingen aktive ordre.</h6>
      </div>
    </div>
        @endforelse
        </div>
@endsection
