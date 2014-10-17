@section('css')

{{ HTML::style('admin/css/front.css') }}

@stop

@section('content')

{{ HTML::image('admin/img/logo.png', '', array('class' => 'img-responsive center-block')) }}

<div id="box">
	<div class="panel panel-primary">
	  	<div class="panel-heading">
	    	<h3 class="panel-title">Reset</h3>
	 	</div>
	  	<div class="panel-body">
	  		@include('admin.alert')
	  		{{ Form::open(array('method' => 'post', 'role' => 'form')) }}
	  			{{ Form::hidden('token', $token) }}
		  		<div class="form-group">
		  		{{ Form::label('inputPassword', 'Password') }}
		  		{{ Form::password('password', array('class' => 'form-control', 'id' => 'inputPassword', 'placeholder' => 'Password')) }}
	  			</div>
		  		<div class="form-group">
		  		{{ Form::label('inputPassword2', 'Confirm Password') }}
		  		{{ Form::password('password_confirmation', array('class' => 'form-control', 'id' => 'inputPassword2', 'placeholder' => 'Confirm Password')) }}
	  			</div>
	  			{{ Form::submit('submit', array('class' => 'btn btn-default')) }}
	  		{{ Form::close() }}
	    </div>
	</div>
	{{ HTML::link('admin/login', 'Go back to login', array('class' => 'btn btn-link center-block')) }}
</div>
@stop