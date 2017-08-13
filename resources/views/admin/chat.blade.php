@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Admin Chats with {{$conversation->name}}  <a href="/admin/conversation" class="btn bt-info">Back</a></div>

                <div class="panel-body">
  <li class="list-group-item">

<ul class="chat">
    
                    	@foreach ($pesan as $pes)
    <li class="left clearfix"><div class="chat-body clearfix"><div class="header"><strong class="primary-font">
                    <?php if($pes->user_id==0)
                    {?>
                    Admin
                    <?php } 
                    elseif($pes->user_id==$conversation->id){?>
                    {{$conversation->name}}
                    <?php } 

                    else{?>
                    <?php } ?>
                        
                                    </strong></div> <p>
                {{$pes->message}}
            </p></div></li>


	@endforeach
    </ul>
		
  </li>
                </div>

<form class="form-horizontal" role="form" method="POST" action="/admin/conversation">
                                                              {{ csrf_field() }}
                    
                <div class="panel-footer">
                    <div class="input-group">  
                        <input id="btn-input" value="0" type="hidden" name="user_id" class="form-control input-sm"> 
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