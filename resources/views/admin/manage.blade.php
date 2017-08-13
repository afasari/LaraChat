@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Admin Manage <a href="/admin/manage/create" class="btn bt-info">Add New</a></div>

                <div class="panel-body">
                <ul class="list-group col-md-8">
	@foreach ($users as $user)
  <li class="list-group-item">
		<a href="{{"/admin/manage/".$user->id."/edit"}}">{{$user->name}}</a>
  </li>
	@endforeach

</ul>
                    <ul class="list-group col-md-4">
	@foreach ($users as $user)
  <li class="list-group-item">
		<a href="{{"/admin/manage/".$user->id."/edit"}}">Edit</a> ||
		<a href="{{"/admin/manage/".$user->id}}">Delete</a>
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