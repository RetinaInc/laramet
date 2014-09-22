<!DOCTYPE html>
<html lang="en">
  	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		{{ HTML::style('bootstrap3/css/bootstrap.min.css') }}
		{{ HTML::style('admin/css/login.css') }}
    </head>
    <body>
    	<div id="login-box">
	    	<div class="panel panel-info">
			  	<div class="panel-heading">
			    	<h3 class="panel-title">Please sign in</h3>
			 	</div>
			  	<div class="panel-body">
			  		@if (isset($alert))
				  		<div class="alert {{ $alert_class }}">
				  			{{ $alert_message }}
				  		</div>
			  		@endif
			    	<form accept-charset="UTF-8" role="form" method="POST">
		                <fieldset>
				    	  	<div class="form-group">
				    		    <input class="form-control" placeholder="E-mail" name="email" type="text">
				    		</div>
				    		<div class="form-group">
				    			<input class="form-control" placeholder="Password" name="password" type="password" value="">
				    		</div>
				    		<div class="checkbox">
				    	    	<label>
				    	    		<input name="remember" type="checkbox" value="Remember Me"> Remember Me
				    	    	</label>
				    	    </div>
				    		<input class="btn btn-success btn-block" type="submit" value="Login">
				    	</fieldset>
			      	</form>
			    </div>
			</div>
    	</div>
		{{ HTML::script('bootstrap3/js/bootstrap.min.css') }}
    </body>
</html>
