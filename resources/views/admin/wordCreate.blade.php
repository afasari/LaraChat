@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add Blacklist Word <a href="/admin/word/@yield('editForm')" class="btn bt-info ">Back</a></div>

                <div class="panel-body">
                  <!-- Don't insert -->
                     <!-- @foreach ($word as $words)
		{{$words}}
  @endforeach -->

                    <form class="form-horizontal" action="/admin/word" method="post">
                    	{{csrf_field()}}
  <fieldset>
    <!-- <legend>Legend</legend> -->
    <div class="form-group">
      <label for="textArea" class="col-lg-2 control-label">Word</label>
      <div class="col-lg-10">
        <input type="text" name="words" class="form-control" placeholder="Word"></input>
        <!-- <span class="help-block">A longer block of help text that breaks onto a new line and may extend beyond one line.</span> -->
        <br>
        <button type="submit" class="btn btn-success">Submit</button>

      </div>
    </div>
    
    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
      </div>
    </div>
  </fieldset>
</form>
                </div>
                <div class="panel-footer">
                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection