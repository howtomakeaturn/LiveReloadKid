

var LiveReloadKid = {
    
    timestamp: null,
    
    url: null,

    ajax: function(url, method, callback, params) {
        var obj;
        try {   
            obj = new XMLHttpRequest();  
        } catch(e){   
            try {     
                obj = new ActiveXObject("Msxml2.XMLHTTP");     
            } catch(e) {     
                try { 
                    obj = new ActiveXObject("Microsoft.XMLHTTP");       
                } catch(e) {       
                    alert("Your browser does not support Ajax.");       
                    return false;       
                }     
            }   
        }
        obj.onreadystatechange = function() {
            if(obj.readyState == 4) {
                callback(obj);
            } 
        }
        obj.open(method, url, true);
        obj.send(params);
        return obj; 
    },
    
    update: function(){
        this.ajax(this.url + '?timestamp=' + this.timestamp, 'get',  function(res) {
            timestamp = JSON.parse(res.responseText).timestamp; 
            if (this.timestamp != timestamp){
                console.info('reload');
                location.reload();
            }
        }.bind(this));
    },
    
    start: function(param){
        this.url = param.url;

        this.ajax(this.url, 'get',  function(res) {
            var timestamp = JSON.parse(res.responseText).timestamp; 
            this.timestamp = timestamp;
            this.update();
            setInterval(function() {
                this.update();
            }.bind(this), 180000);

        }.bind(this));
        
    }
            
};
