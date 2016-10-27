@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Post an article</div>

                <div class="panel-body">

                    <form class="form-horizontal" action="/article/post" method="POST" enctype="multipart/form-data">
					  <fieldset>
					  	<input type="hidden" name="_token" value="{{ csrf_token() }}">
					  	<input type="hidden" name="author_id" value="{{ Auth::user()->id }}">
					    <div class="form-group">
					      <label for="title" class="col-lg-2 control-label">Title</label>
					      <div class="col-lg-10">
					        <input type="text" class="form-control" id="title" name="title" placeholder="Title">
					      </div>
					    </div>					
					    <div class="form-group">
					      <label for="body" class="col-lg-2 control-label">Body</label>
					      <div class="col-lg-10">
					        <textarea class="form-control" rows="3" id="body" name="body" placeholder="Body"></textarea>
					        <span class="help-block">A longer block of help text that breaks onto a new line and may extend beyond one line.</span>
					      </div>
					    </div>
					    <div class="form-group">
					    	<label for="photo_url" class="col-lg-2 control-label">Photo</label>
					    	<div class="col-lg-10">
					    		<input type="file" name="photo_url">
					    	</div>
					    </div>
					    <div class="form-group">
					      <div class="col-lg-10 col-lg-offset-2">
					        <button type="reset" class="btn btn-default">Clear</button>
					        <button type="submit" class="btn btn-primary">Post</button>
					      </div>
					    </div>
					  </fieldset>
					</form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection