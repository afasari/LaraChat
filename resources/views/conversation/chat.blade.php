@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Chats {{ $currentuser->name }} with {{$conversation->name}}  <a href="/conversation" class="btn bt-info">Back</a></div>

                <div class="panel-body">
  <li class="list-group-item">

<ul class="chat">
    
                    	@foreach ($pesan as $pes)
    <li class="left clearfix"><div class="chat-body clearfix"><div class="header"><strong class="primary-font">
                    <?php if($pes->user_id==$currentuser->id)
                    {?>
                    {{$currentuser->name}}
                    <?php } 
                    elseif($pes->user_id==$conversation->id){?>
                    {{$conversation->name}}
            </p></div></li>
                    <?php } 

                    else{ echo "Admin";                    
                     } ?>

                </strong></div> <p>
                {{$pes->message}}
            </p></div></li>

	@endforeach
    </ul>
		
  </li>
                </div>
                <div class="panel-footer">
                    <div class="input-group">  
                        <form class="form-horizontal" role="form" method="POST" action="/conversation">
                                                              {{ csrf_field() }}
                    <input id="btn-input" value="{{$currentuser->id}}" type="hidden" name="user_id" class="form-control input-sm"> 
                    <input id="btn-input" value="{{$conversation->id}}" type="hidden" name="recipient_id" class="form-control input-sm"> 

                    <input id="btn-input" type="text" name="message" placeholder="Type your message here..." class="form-control input-sm"> 
                    <span class="input-group-btn">
                        <!-- <form class="form-horizontal" role="form" method="POST" action="/admin/manage"> -->
                    
                        <button id="btn-chat"  class="btn btn-primary btn-sm">
            Send
        </button>
        </span></div>
        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection