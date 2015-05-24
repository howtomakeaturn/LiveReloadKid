<?php namespace Howtomakeaturn\LiveReloadKid;

class LiveReloadKid
{

    public function greeting()
    {
        return 'Hi';
    }
    
    protected $file;
    
    public function __construct($file)
    {
        $this->file = $file;
    }
    
    public function monitor()
    {
        return json_encode(['timestamp' => filemtime($this->file)]);
    }
    
}
