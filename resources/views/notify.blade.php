@section('scripts')
	@parent
	<script type="text/javascript" charset="utf-8">
        $(function ()
        {
            @if (session('notify.title'))
                $.notify({
                    title: "{!! session('notify.title') !!}",
                    content: "{!! session('notify.content') !!}",
                    level: "{{ session('notify.level') }}",

                    @if (session('notify.icon'))
                        icon: "fa fa-{{ session('notify.icon') }}",
                    @endif

                    @if (session('notify.iconSmall'))
                        iconSmall: "fa fa-{{ session('notify.iconSmall') }}",
                    @endif

                    @if (session('notify.timeout'))
                        timeout: {{ session('notify.timeout') }},
                    @endif
                });
            @endif
        });
	</script>
@endsection
