# Flash notifications + Alert notifications

Laravel 5 Flash Notifications for SmartAdmin 1.5.2 and Alert Notifications for SmartAdmin / Bootstrap 3

## Laravel 5 + SmartAdmin 1.5.2

Based on Jeffreay Way's package, this one is just optimized for smartadmin and bootstrap.
> [laracasts/flash](https://github.com/laracasts/flash)

> [Learn exactly how to build this very package on Laracasts!](https://laracasts.com/lessons/flexible-flash-messages)

## Installation

First, pull in the package through Composer.

```js
"require": {
	"bpocallaghan/notify": "1.0.*"
}
```

And then, if using Laravel 5, include the service provider within `app/config/app.php`.

```php
'providers' => [
    'Bpocallaghan\Notify\NotifyServiceProvider',
	'Bpocallaghan\Notify\NotifyAlertServiceProvider',
];
```

And, for convenience, add a facade alias:

```php
'aliases' => [
    'Notify'      => 'Bpocallaghan\Notify\Facades\Notify',
	'NotifyAlert' => 'Bpocallaghan\Notify\Facades\NotifyAlert',
];
```

## Usage

Within your master view file.

```html
@include('notify::notify')
@include('notify::notify_alert')
```

Within your controllers, before you return the view...

```php
public function index()
{
	notify('This is the title', 'content first line<br/>content second line');
	
	return view('home');
}
```

You may also do:

- `Notify::info('title', 'description');`
- `Notify::success('title', 'description');`
- `Notify::warning('title', 'description');`
- `Notify::error('title', 'description');`
- `Notify::info('This is the title', 'content', 'smile-o', 5000);`
- `Notify::message('title', 'description', 'smile-o', 'info', 0, 'big');`

To show an overlay:
- `Notify::overlay('This is a modal', '<strong>Lorem Ipsum</strong>');`

If you need to modify the partials, you can run:

```bash
php artisan vendor:publish --provider="Bpocallaghan\Notify\NotifyServiceProvider"
```

The two views will be located in the 'resources/views/vendor/notify/' directory.

## Tank you

- Thank you [Jeffrey Way](https://github.com/JeffreyWay) for the awesome resources at [Laracasts](https://laracasts.com/).
- Thank you [Taylor Ottwell](https://github.com/taylorotwell) for [Laravel](http://laravel.com/).
