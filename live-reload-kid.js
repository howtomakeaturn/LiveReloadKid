var LiveReloadKid = {
    
    timestamp: null,
    
    url: null,
    
    update: function(){
        $.get(this.url, {}, function(res){
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
    
    start: function(param){
        this.url = param.url;
        
        setInterval(function() {
            this.update();
        }.bind(this), 1000);
    }
            
};
