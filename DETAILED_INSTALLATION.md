# Detailed installation for a fresh installation of Laravel.


```bash
composer create-project laravel/laravel:9.1.* example-app

cd example-app

composer require bpocallaghan/notify
```

```bash
npm install admin-lte@3.1.0 --save
npm install bootstrap@4.6.0 --save
```

rename `resources/css/app.css` to `resources/css/app.scss`

add this code to `resources/css/app.scss`

```css
// AdminLTE
@import '~admin-lte/build/scss/AdminLTE';

// Font Awesome
@import '~@fortawesome/fontawesome-free/scss/fontawesome';
@import '~@fortawesome/fontawesome-free/scss/solid';
@import '~@fortawesome/fontawesome-free/scss/brands';
@import '~@fortawesome/fontawesome-free/scss/regular';
```

update `resources/js/app.js` with this code

```js
import './bootstrap';

require('admin-lte');
```

add this code to `resources/js/bootstrap.js`

```js
try {
    window.Popper = require('popper.js').default;
    window.$ = window.jQuery = require('jquery');

    require('bootstrap');
} catch (e) { }
```

update `webpack.mix.js` with this code:

```js
mix.js('resources/js/app.js', 'public/js')
.copy('vendor/bpocallaghan/notify/resources/assets/danger.mp3', 'public/sounds')
.copy('vendor/bpocallaghan/notify/resources/assets/info.mp3', 'public/sounds')
.copy('vendor/bpocallaghan/notify/resources/assets/notify.css', 'public/css')
.copy('vendor/bpocallaghan/notify/resources/assets/notify.js', 'public/js')
.sass('resources/css/app.scss', 'public/css');
```

```bash
npm install
npm run dev
```

add this code to `welcome.blade.php`

```html
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<link rel="stylesheet" href="{{ asset('css/notify.css') }}">

@include('notify::notify')

notify()->info('Title', 'Description');

<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/notify.js') }}"></script>
@yield('scripts')
```

full code of `resources/views/welcome.blade.php`
```html
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/notify.css') }}">

    <title>Notify Example</title>
</head>

<body>
    @include('notify::notify')

    <h1>Notify Example</h1>

    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/notify.js') }}"></script>
    @yield('scripts')
</body>

</html>
```


add this code for a controller or a Closure:

```php
notify()->info('Title', 'Description');
```

for example in `routes/web.php`

```php
Route::get('/', function () {
    notify()->info('Title', 'Description');
    return view('welcome');
});
```

