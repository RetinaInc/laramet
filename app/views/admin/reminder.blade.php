@section('css')

{{ HTML::style('admin/css/front.css') }}

@stop

@section('content')

{{ HTML::image('admin/img/logo.png', '', array('class' => 'img-responsive center-block')) }}

<div id="box">
	<div class="panel panel-primary">
	  	<div class="panel-heading">
	    	<h3 class="panel-title">Reminder</h3>
	 	</div>
	  	<div class="panel-body">
		  	@include('admin.alert')
	  		{{ Form::open(array('method' => 'post')) }}
		  		<div class="form-group @if ($errors->has('email')) has-error @endif">
			    	<label for="inputEmail">Email</label>
			    	{{ Form::email('email', Input::old('email'), array('id' => 'inputEmail', 'class' => 'form-control', 'placeholder' => 'Etner your email address')) }}
			    	@if ($errors->has('email')) 
			    	<p class="help-block">{{ $errors->first('email') }}</p> 
			    	@endif
			  	</div>
			    <button type="submit" class="btn btn-default btn-block">Send Reminder</button>
			    <div class="clearfix"></div>
			{{ Form::close() }}
		</div>
	</div>
	{{ HTML::link('admin/login', 'Go back to login', array('class' => 'btn btn-link center-block')) }}
</div>

@stop
