@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Conversation {{ $currentuser->name }}</div>

                <div class="panel-body">
                <ul class="list-group">
    @foreach ($users as $user)

    @if ($user->name != $currentuser->name)
  <li class="list-group-item">
		<a href="{{"/conversation/".$user->id."/chat"}}">{{$user->name}}</a>
  </li>
  
@endif
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