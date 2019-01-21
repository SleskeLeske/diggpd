@extends('admin.layout.admin')

@section('content')

<h3 align="center">Bruker søk</h3>
<div class="panel panel-default">

  <div class="panel-body">
    <input type="text" name="search" id="search" class="form-control" placeholder="Søk bruker data" />
  </div>
  <div class="table-responsive">
    <h3 align="center">Total data: <span id="total_records"></span></h3>
<table class="table table-hover">
<thead>
<tr>
  <th>Id</th>
  <th>Email</th>
  <th>Fornavn</th>
  <th>Etternavn</th>
  <th>Addresse</th>
  <th>Postnr</th>
  <th>Stedsnavn</th>
  <th>Tlf nr</th>
  <th>Status</th>
  <th>Rolle</th>
  <th>Brukerfødsel</th>
  <th>Kreditter</th>
</tr>
</thead>
<tbody>


</tbody>
</table>

@endsection
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<script>
  $(document).ready(function() {
    fetch_customer_data();

    function fetch_customer_data(query = '')
    {
      $.ajax({
        url:"{{route('live_search.action')}}",
        method:'GET',
        data:{query:query},
        dataType:'json',
        success:function(data)
        {
          $('tbody').html(data.table_data);
          $('#total_records').text(data.total_row);
        },
        error: function(data) {
          var errors = data.responseJSON;
          console.log(errors);
        },
      })
    }
    $(document).on('keyup', '#search', function(){
      var query = $(this).val();
      fetch_customer_data(query);
    });
  });
</script>
