@section('css')
	
	{{ HTML::style('admin/css/style.css') }}

@stop

@section('header')
	
	@include('admin.header')

@stop

@section('content')

    <div class="page-header">
      	<h1>Passowrd <small>Change password.</small></h1>
	</div>

    <ol class="breadcrumb">
        <li>
            <i class="fa fa-dashboard"></i>  <a href="index.html">{{ trans('common.dashboard') }}</a>
        </li>
        <li class="active">
            <i class="fa fa-key"></i> {{ trans('form.password') }}
        </li>
    </ol>
	
	@include('admin.alert')
	
	{{ 	Form::open(array(
			'method' => 'POST', 
			'class' => 'form-horizontal', 
			'role' => 'form'
		)) }}
		<div class="form-group @if ($errors->has('password')) has-error @endif">
	    	<label for="inputpassword" class="col-sm-3 control-label">{{ trans('form.password') }}</label>
	    	<div class="col-sm-4">
				{{ 	Form::password(
						'password', 
						array(
							'class' => 'form-control', 
							'id' => 'inputpassword'
					)) }}
				@if ($errors->has('password')) <p class="help-block">{{ $errors->first('password') }}</p> @endif
	    	</div>
	  	</div>
		<div class="form-group @if ($errors->has('new_password')) has-error @endif">
	    	<label for="inputnewpassword" class="col-sm-3 control-label">{{ trans('form.new_password') }}</label>
	    	<div class="col-sm-4">
				{{ 	Form::password(
						'new_password', 
						array(
							'class' => 'form-control', 
							'id' => 'inputpassword'
					)) }}
				@if ($errors->has('new_password')) <p class="help-block">{{ $errors->first('new_password') }}</p> @endif
	    	</div>
	  	</div>
		<div class="form-group @if ($errors->has('confirm_password')) has-error @endif">
	    	<label for="inputconfirm_password" class="col-sm-3 control-label">{{ trans('form.confirm_password') }}</label>
	    	<div class="col-sm-4">
				{{ 	Form::password(
						'confirm_password', 
						array(
							'class' => 'form-control', 
							'id' => 'inputconfirm_password'
					)) }}
				@if ($errors->has('confirm_password')) <p class="help-block">{{ $errors->first('confirm_password') }}</p> @endif
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
