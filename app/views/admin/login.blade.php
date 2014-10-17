@section('css')

{{ HTML::style('admin/css/front.css') }}

@stop

@section('content')

{{ HTML::image('admin/img/logo.png', '', array('class' => 'img-responsive center-block')) }}

<div id="box">
	<div class="panel panel-primary">
	  	<div class="panel-heading">
	    	<h3 class="panel-title">Please sign in</h3>
	 	</div>
	  	<div class="panel-body">
	  		@include('admin.alert')
	    	{{ Form::open(array('role' => 'form' )) }}
                <fieldset>
		    	  	<div class="form-group">
		    	  		{{ Form::email('email', Input::get('email'), array(
		    	  			'placeholder' => 'Email', 
		    	  			'class' => 'form-control'
		    	  		)) }}
		    		</div>
		    		<div class="form-group">
		    			<input class="form-control" placeholder="Password" name="password" type="password" value="">
		    		</div>
		    		<input class="btn btn-success btn-block" type="submit" value="Login">
		    	</fieldset>
	      	{{ Form::close() }}
	    </div>
	</div>
	{{ HTML::link('admin/reminder', 'Forgot password?', array('class' => 'btn btn-link center-block')) }}
</div>

@stop