# LiveReloadKid
Automatically reload your browser when specified files are updated with only **PHP** and **JavaScript**!

You're currently developing, and modify css/js files very frequently?

Don't need to press **ctrl + R** or **ctrl + F5** to refresh your browser  anymore!

Let LiveReloadKid save your fingers!☺

#Installation
You can just download the file to your project, or install it via composer:

```
composer require "howtomakeaturn/live-reload-kid:0.1.*"
```
And then move **live-reload-kid.js** file to your asset folder.

#Client-side
Set the url to where you will trigger the LiveReloadKid.
```html
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

Let's say you are using Laravel.
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
<script src='live-reload-kid.js'></script>
<script>
    LiveReloadKid.start({
        url: '/monitor'
    });
</script>

```
Everytime you update the view files or javascript files, your browser will reload automatically!
# The Magic Behind
LiveReloadKid monitors the file system with **long polling** technique, notifying your browser if files modified in real-time!


# Thanks to
LiveReloadKid is inspired by https://github.com/dbergey/Reloadr

Thanks [bilzen](http://www.reddit.com/user/bilzen) and [tobozo](http://www.reddit.com/user/tobozo) for the suggestions on Reddit.
