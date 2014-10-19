@section('css')
	
	{{ HTML::style('admin/css/style.css') }}

@stop

@section('header')
	
	@include('admin.header')

@stop

@section('content')
    <div class="page-header">
      	<h1>Account <small>Edit your account.</small></h1>
	</div>

    <ol class="breadcrumb">
        <li>
            <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
        </li>
        <li class="active">
            <i class="fa fa-file"></i> Account
        </li>
    </ol>
	
	@include('admin.alert')
	
	{{ 	Form::open(array(
			'method' => 'POST', 
			'class' => 'form-horizontal', 
			'role' => 'form'
		)) }}
		<div class="form-group @if ($errors->has('email')) has-error @endif">
	    	<label for="inputEmail" class="col-sm-3 control-label">{{ trans('form.email') }}</label>
	    	<div class="col-sm-4">
				{{ 	Form::text(
						'email', 
						$data['email'],
						array(
							'class' => 'form-control', 
							'id' => 'inputEmail'
					)) }}
				@if ($errors->has('email')) <p class="help-block">{{ $errors->first('email') }}</p> @endif
	    	</div>
	  	</div>
		<div class="form-group @if ($errors->has('first_name')) has-error @endif">
	    	<label for="inputFirstName" class="col-sm-3 control-label">{{ trans('form.first_name') }}</label>
	    	<div class="col-sm-4">
				{{ 	Form::text(
						'first_name', 
						$data['first_name'], 
						array(
							'class' => 'form-control', 
							'id' => 'inputFirstName'
					)) }}
				@if ($errors->has('first_name')) <p class="help-block">{{ $errors->first('first_name') }}</p> @endif
	    	</div>
	  	</div>
		<div class="form-group @if ($errors->has('last_name')) has-error @endif">
	    	<label for="inputLastName" class="col-sm-3 control-label">{{ trans('form.last_name') }}</label>
	    	<div class="col-sm-4">
				{{ 	Form::text(
						'last_name', 
						$data['last_name'], 
						array(
							'class' => 'form-control', 
							'id' => 'inputLastName'
					)) }}
				@if ($errors->has('last_name')) <p class="help-block">{{ $errors->first('last_name') }}</p> @endif
	    	</div>
	  	</div>
	  	<div class="well well-sm">
			<div class="form-group">
				<div class="col-sm-9 col-sm-offset-3">
					{{ HTML::link('admin/dashboard', 'Cancel', array('class' => 'btn btn-default')) }} <button type="submit" class="btn btn-primary"> Submit</button>
				</div>
			</div>
	  	</div>
	{{ Form::close() }}
	
@stop
