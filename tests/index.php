<?php
error_reporting(-1);
ini_set('display_errors', 'On');
require('../vendor/autoload.php');
?>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js'></script>
<script src='live-reload-kid.js'></script>
<script>
    LiveReloadKid.start({
        url: 'monitor.php'
    });
</script>
wwww
