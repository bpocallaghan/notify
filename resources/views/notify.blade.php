@if (Session::has('notify.type'))
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

{{--overlay modal--}}
@if (Session::has('notify.overlay'))
	<div id="notify-overlay-modal" class="modal fade">
		<div class="modal-dialog" style="z-index: 9999;">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

					<h4 class="modal-title">{{ Session::get('notify.title') }}</h4>
				</div>

				<div class="modal-body">
					<p>{!! Session::get('notify.content') !!}</p>
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>

	@section('scripts')
		@parent
		<script type="text/javascript" charset="utf-8">
			$(function() {
				$('#notify-overlay-modal').modal();
			})
		</script>
	@endsection
@endif

{{--global functions to call the alerts--}}
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