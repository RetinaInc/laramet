@if (Session::has('alert'))
	<div class="alert {{ Session::get('alert_class') }}">
		<button type="button" class="close" data-dismiss="alert">
			<span aria-hidden="true">&times;</span>
			<span class="sr-only">Close</span>
		</button>
		{{ Session::get('alert') }}
	</div>
@endif
