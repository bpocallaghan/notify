@if (Session::has('notify_alert.title'))
	<div class="alert alert-{{ Session::get('notify_alert.level') }} fade in">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		@if (Session::has('notify_alert.icon'))
			<i class="fa-fw fa fa-{{ Session::get('notify_alert.icon') }}"></i>
		@endif
		<strong>{{ Session::get('notify_alert.title') }}</strong>
		{{ Session::get('notify_alert.content') }}
	</div>
@endif