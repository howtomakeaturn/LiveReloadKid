<?php namespace Howtomakeaturn\LiveReloadKid;

use RecursiveIteratorIterator;
use RecursiveDirectoryIterator;

class LiveReloadKid
{
    
    protected $folders;
    
    public function __construct($folders)
    {
        $this->folders = $folders;
    }
    
    protected function getFIles($path)
    {
        $rii = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path));

        $files = array(); 

        foreach ($rii as $file) {
            if ($file->isDir()){ 
                continue;
            }
            $files[] = $file->getPathname(); 
        }
        
        return $files;
    }
    
    protected function resolvePath($path)
    {
        $files = [];
        if(is_array($path)){
            foreach($path as $p){
                $files = array_merge($files, $this->getFIles($p));
            }
        } else {
            $files = $this->getFIles($path);
        }

        return $files;
    }
    
    protected function getLastModifiedTime($files)
    {
        $timestamps = [];

        foreach ( $files as $file ){
            $timestamps[] = filemtime($file);     
        }   
        
        return max($timestamps);
    }
    
    public function monitor()
    {  
        if(array_key_exists('timestamp', $_GET)){
            for( $i = 0 ; $i < 180 ; $i++ ){
                $timestamp = $this->getLastModifiedTime($this->resolvePath($this->folders));
                if ($_GET['timestamp'] == $timestamp){
                    sleep(1);
                }else{
                    return json_encode([
                        'timestamp' => $timestamp
                    ]);                                
                }
            }
            return json_encode([
                'timestamp' => $timestamp
            ]);                          
        }else{
            $timestamp = $this->getLastModifiedTime($this->resolvePath($this->folders));
            
             return json_encode([
                'timestamp' => $timestamp
            ]);            
        }
    }
    
}
