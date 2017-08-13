@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Admin Conversation
                     </div>

                <div class="panel-body">
                <ul class="list-group">
    @foreach ($users as $user)
  <li class="list-group-item">
		<a href="{{"/admin/conversation/".$user->id."/chat"}}">{{$user->name}}</a>
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