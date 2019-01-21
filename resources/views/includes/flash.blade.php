@if ($flash = session('message'))
<div id="flash" class="alert alert-success">
  <h1>{{$flash}}</h1>
</div>
@endif
