# LiveReloadKid
Automatically reload your browser when specified files are saved.

Don't need to press **ctrl + R** or **ctrl + F5**  anymore!

Save your fingers!☺

#installation
You can just download the file to your project, or install it via composer:

```
composer require "howtomakeaturn/live-reload-kid:0.1.*"
```
And move **live-reload-kid.js** file to your asset folder.

#Client-side
Jquery as the only dependency.

Set the url to where you will trigger the LiveReloadKid.
```html
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js'></script>
<script src='live-reload-kid.js'></script>
<script>
    LiveReloadKid.start({
        url: 'monitor.php'
    });
</script>
```
#Server-side
Pass paths to the folder you want to monitor into the constructor.

And then just return the response.
```php
// monitor.php

$monitor = new Howtomakeaturn\LiveReloadKid\LiveReloadKid(['folder/js', 'folder/css']);

echo $monitor->monitor();
```

Done!

#Example

let's say you are using Laravel.
Just add this to the app/routes.php
```php
Route::get('/monitor', function(){
    $kid = new Howtomakeaturn\LiveReloadKid\LiveReloadKid([
        public_path('/js'), app_path('views')
    ]);
    
    echo $kid->monitor();
});
```
And then in the client side
```html
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js'></script>
<script src='live-reload-kid.js'></script>
<script>
    LiveReloadKid.start({
        url: '/monitor'
    });
</script>

```

# Thanks to
LiveReloadKid is inspired by https://github.com/dbergey/Reloadr

Thanks [bilzen](http://www.reddit.com/user/bilzen) and [tobozo](http://www.reddit.com/user/tobozo) for the suggestions on Reddit.
