# Notify (Laravel)

Notify alert boxes to the browser with sound and font awesome icons and give it a timeout to fly out.
Works great to notify the user after a successfull action (CRUD).
Flash the information from Laravel or create multiple from javascript.

###Want to see the current package in action, have a look at my starter project.
####[Laravel Starter Project](https://github.com/bpocallaghan/laravel-admin-starter)

## Installation

First, pull in the package through Composer.

```js
"require": {
    "bpocallaghan/notify": "2.*"
}
```
OR 
```bash
composer require bpocallaghan/notify
```

### Laravel <5.4 only (Laravel 5.5 has automatic package discovery)
Include the service provider within `config\app.php`.

```php
'providers' => [
    Bpocallaghan\Notify\NotifyServiceProvider::class,
];
```

Add a facade alias or use the globel helper function `notify()`.

```php
'aliases' => [
    'Notify' => Bpocallaghan\Notify\Facades\Notify::class,
];
```

## Usage

Within any view file (preferable your master layout).

```html
@include('notify::notify')
```

Within any Controller.

```php
public function index()
{
    // helper function - default to the 'info'
    notify('Title', 'Description');
    
    // return object first
    notify()->info('Title', 'Description');
    
    // via the facade
    Notify::info('Title', 'Description');
    
    return view('home');
}
```

The different 'levels' are:
- `notify()->info('Title', 'Description');`
- `notify()->success('Title', 'Description');`
- `notify()->warning('Title', 'Description');`
- `notify()->error('Title', 'Description');`

The different arguments:
- `notify()->info('Title', 'Description', false);` // without the icon
- `notify()->info('Title', 'Description', 'smile-o');` // specify the icon class
- `notify()->message($level = 'info', $title, $content, $icon, $iconSmall, $timeout = 5000)` // arguments
- `notify()->message('info', 'Title', 'Description', 'smile-o');` // specify the type of level
- `notify()->message('info', 'Title', 'Description', 'smile-o', 'thumbs-o-up');` // show a different small icon
- `notify()->message('info', 'Title', 'Description', 'smile-o', 'thumbs-o-up', 10000);` // specify the timeout

If you need to modify the view partial, you can run:

```bash
php artisan vendor:publish --provider="Bpocallaghan\Notify\NotifyServiceProvider" --tag=view
```

The view partial can be found here `resources\views\vendor\notify\notify.blade`.

You need to publish the assets.

```bash
php artisan vendor:publish --provider="Bpocallaghan\Notify\NotifyServiceProvider" --tag=public
```

Find the files here `public\vendor\notify\`.
Move the mp3s to `public\sounds\`.
If you use Laravel Elixir, move the css and js to your `resource\assets` and include them in your gulpfile.js, otherwise link to the individual files in your html header.

## TODO

- Maybe a config file (sound on/off, sound path, position, fade in/out, etc)
- Cleanup code (decide on the animations.css)
- Maybe add a bigger box
- Maybe add a 'modal' option (bootstrap's modal)

## Note

Please keep in mind this is for my personal workflow and might not fit your need.
I developed this to help speed up my day to day workflow. 
Please let me know about any issues or if you have any suggestions.

## My other Packages

- [Flash a bootstrap alert](https://github.com/bpocallaghan/alert)
- [Laravel custom Generate Files with a config file and publishable stubs](https://github.com/bpocallaghan/generators)
