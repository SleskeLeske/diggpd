<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<div class="hero">
  <p>Bergens beste <span>leverings</span> tjeneste</p>
  <h1>DIGG PÅ DØREN</h1>
  <h6>Sjekk ditt postnr:</h6>

  <div class="form-group">

  <input type="text" name="search" id="search" class="form-control" placeholder="Søk postnr" />

  </div>
  <div class="result-div">

  <ul id="result">

  </ul>
  </div>
</div>
<script>
  $(document).ready(function() {
    fetch_postnr();

    function fetch_postnr(query = '')
    {
      $.ajax({
        url:"{{route('postnr.search')}}",
        method:'GET',
        data:{query:query},
        dataType:'json',
        success:function(data)
        {
          $('#result').html(data.table_data);
        },
        error: function(data) {
          var errors = data.responseJSON;
          console.log(errors);
        },
      })
    }
    $(document).on('keyup', '#search', function(){
      var query = $(this).val();
      fetch_postnr(query);
    });
  });
</script>
