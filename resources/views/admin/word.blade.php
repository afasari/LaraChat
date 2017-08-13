@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading ">Blacklisted Word <a href="/admin/word/create" class="btn bt-info">Add New</a></div>
                <div class="panel-body">
                
                    <ul class="list-group col-md-8">
	@foreach ($words as $word)
  <li class="list-group-item">
		<a href="{{"/admin/word/".$word->id."/edit"}}">{{$word->words}}</a>
  </li>
	@endforeach

</ul>
                    <ul class="list-group col-md-4">
	@foreach ($words as $word)
  <li class="list-group-item">
		<a href="{{"/admin/word/".$word->id."/edit"}}">Edit</a> ||
		<!-- <a href="{{"/word/".$word->id}}">Delete</a> -->
        <form class="form-group pull-right" action="{{'/admin/word/'.$word->id}}" method="post">
{{csrf_field()}}
{{method_field('DELETE')}}
<button type="submit" style="border:non;">Delete<i class="fa fa-trash-o" aria-hidden="true"></i></button>
</form>

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