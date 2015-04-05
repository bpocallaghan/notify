@if (Session::has('notify.title'))
	@section('scripts')
		@parent
		<script type="text/javascript">
			$(function ()
			{
				@if (Session::has('notify.type') && Session::get('notify.type') == 'small')
					$.smallBox({
						color: "{{ Session::get('notify.color') }}",
						title: "{!! Session::get('notify.title') !!}",
						content: "{!! Session::get('notify.content') !!}",

						@if (Session::has('notify.icon'))
							icon: "fa fa-{{ Session::get('notify.icon') }}",
							iconSmall: "fa fa-{{ Session::get('notify.icon') }}",
						@endif

						@if (Session::has('notify.timeout'))
							timeout: {{ Session::get('notify.timeout') }},
						@endif

						sound: $.sound_on
					});
				@endif

				@if (Session::has('notify.type') && Session::get('notify.type') == 'big')
					$.bigBox({
						color: "{{ Session::get('notify.color') }}",
						title: "{!! Session::get('notify.title') !!}",
						content: "{!! Session::get('notify.content') !!}",

						@if (Session::has('notify.icon'))
							icon: "fa fa-{{ Session::get('notify.icon') }}",
							{{--iconSmall:  "fa fa-{{ Session::get('notify.icon') }}",--}}
						@endif

						@if (Session::has('notify.timeout'))
							timeout: {{ Session::get('notify.timeout') }},
						@endif

						sound: $.sound_on
					});
				@endif
			});
		</script>
	@endsection
@endif

{{--todo--}}
@if (Session::has('notify.overlay'))
	@include('partials/_modal', ['modalClass' => 'flash-modal', 'title' => 'Notice', 'body' => Session::get('flash_notify.message')])
@endif

@section('scripts')
	@parent
	<script type="text/javascript" charset="utf-8">
		function smallBox(title, description, color, icon)
		{
			if (color == undefined)
			{
				color = "#739E73";
			}
			if (icon == undefined)
			{
				icon = 'thumbs-up bounce animated';
			}

			$.smallBox({
				title: title,
				content: description,
				color: color,
				timeout: 5000,
				icon: "fa fa-" + icon
			});
		}

		function smallErrorBox(title, description)
		{
			if (title == undefined)
			{
				title = "Oops";
			}
			if (description == undefined)
			{
				description = 'Something went wrong';
			}

			smallBox(title, description, '#C46A69', 'warning shake animated');
		}
	</script>
@endsection