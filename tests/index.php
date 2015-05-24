<?php
error_reporting(-1);
ini_set('display_errors', 'On');
require('../vendor/autoload.php');
?>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js'></script>
<script>
    var LiveReloadKid = {
        
        timestamp: null,
        
        update: function(){
            $.get('/monitor.php', {}, function(res){
                console.info('timestamp: ' + res.timestamp);
                if (!this.timestamp){
                    this.timestamp = res.timestamp;
                } else {
                    if (this.timestamp != res.timestamp){
                        console.info('reload');
                        location.reload();
                    }
                }
            }.bind(this), 'json');
        },
        
        start: function(){
            setInterval(function() {
                this.update();
            }.bind(this), 1000);
        }
                
    };
</script>
<script>
    LiveReloadKid.start();
</script>
wwww
