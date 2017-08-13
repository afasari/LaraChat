@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading ">Blacklisted Word <a href="/admin/word/create" class="btn bt-info">Add New</a></div>
                <div class="panel-body">
                
                    <ul class="list-group">
    @foreach ($word as $words)
      <li class="list-group-item">
		{{$words}}
  </li>

	@endforeach

</ul>
                </div>
                <div class="panel-footer">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection