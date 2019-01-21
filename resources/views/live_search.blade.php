<!DOCTYPE html>
<html>
  <head>
    <title>ye</title>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  </head>
  <body>
    <div class="container">
      <h3 align="center">Live search</h3>
      <div class="panel panel-default">
        <div class="panel-heading">Search</div>
        <div class="panel-body">
          <input type="text" name="search" id="search" class="form-control" placeholder="Search customer data" />
        </div>
        <div class="table-responsive">
          <h3 align="center">Total data: <span id="total_records"></span></h3>
          <table class="table table-striped table-bordered">
            <thead>
              <tr>
                <th>Name</th>
                <th>Email</th>
                <th>First Name</th>
              </tr>
            </thead>
            <tbody>

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </body>
</html>

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
