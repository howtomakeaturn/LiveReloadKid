var LiveReloadKid = {
    
    timestamp: null,
    
    update: function(){
        $.get('/monitor.php', {}, function(res){
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
