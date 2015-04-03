<?php namespace Bpocallaghan\Notify;

use Illuminate\Support\ServiceProvider;

class NotifyServiceProvider extends ServiceProvider
{

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->bindShared('notify', function ()
		{
			return $this->app->make('Bpocallaghan\Notify\Notify');
		});
	}

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->loadViewsFrom(__DIR__ . '/../resources/views', 'notify');

		$this->publishes([
			__DIR__ . '/../resources/views' => base_path('resources/views/vendor/notify')
		]);
	}

}
