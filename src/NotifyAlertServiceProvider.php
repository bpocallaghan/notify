<?php namespace Bpocallaghan\Notify;

use Illuminate\Support\ServiceProvider;

class NotifyAlertServiceProvider extends ServiceProvider
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
		$this->app->bind('notify_alert', function ()
		{
			return $this->app->make('Bpocallaghan\Notify\NotifyAlert');
		});
	}

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		//
	}

}
