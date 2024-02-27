<?php

require_once(BASEDIR."/apps/mysqli.php");
require_once(BASEDIR."/apps/sync.php");
require_once(BASEDIR."/apps/image.php");
require_once(BASEDIR."/apps/style.php");

class cc_theme {
    private $var;

    public $html;
    public $handle;
    public $objects;

    function __construct(){

        $files = array(
                        'file'        => '',
                        'response'    => '404',
                        'header'      => '',
                        'header_size' => '',
                        'type'        => '',
                        'body_size'   => '',
                        'title'       => '',
                        'body'        => ''
                );
        //$this->handle  = array();
        //$this->objects = new stdClass;
        $this->objects = array(
            'http'    => 'cache',
            'table'   => '',
            'date'    => '',
            'time'    => '',
            'count'   => '',
            'token'   => '',
            'request' => '',
            'state'   => '',
            'check'   => 'error',             
            'lists'   => array(
                /*'file_000' => $files,
                'file_002' => $files,
                'file_003' => $files,
                'file_004' => $files,
                'file_005' => $files,
                'file_006' => $files,
                'file_007' => $files,
                'file_008' => $files,
                'file_009' => $files,
                'file_010' => $files,
                'file_011' => $files,
                'file_012' => $files,
                'file_013' => $files,
                'file_014' => $files,
                'file_015' => $files,
                'file_016' => $files,
                'file_017' => $files,
                'file_018' => $files,
                'file_019' => $files,
                'file_020' => $files,
                'file_021' => $files,    
                'file_022' => $files*/
            ),
            'endl' => ''
        );

        $this->handle = $this->objects;
       // $this->handle = json_encode($this->objects, JSON_PRETTY_PRINT);

        $this->html = "test theme ";    
    }
    public function url($url){
        
        global $dbcon;

        if($url == null){
            
            $this->html = $this->html ."==";
        }else{
            $addr = explode('/', $url);
            if(strcmp($addr[1],"api") ==0){
                if(empty($addr[2])){

                    return;
                }
                $postfx['default'] = '';
                $postfx['curl']    = $url; 
                //if(empty($addr[3])){

                //    return;
                //}
                $dbcon->init();

                foreach($_POST as $keys => $value){
                    $postfx[$keys] = $value;
                }

                if($this->handle = $dbcon->cache($this->handle, "cache", $postfx)){
                    if($this->handle->check != 'OK'){ 
                    //echo $this->handle->check;
                    }
                }

                if(strcmp($addr[2], "update") == 0){
                    $this->handle = $dbcon->control($this->handle, "update", $postfx);
                }else
                if(strcmp($addr[2], "create") == 0){
                    $this->handle = $dbcon->control($this->handle, "create", $postfx);
                }else
                if(strcmp($addr[2], "remove") == 0){
                    $this->handle = $dbcon->control($this->handle, "remove", $postfx);
                }
                $dbcon->close();
            }else
            if(strcmp($addr[1],"modify") == 0){
                if(empty($addr[2])){

                    return;
                }

                if(strcmp($addr[2], "install") ==0){

                }else
                if(strcmp($addr[2], "unstall") ==0){

                }

            }else
            if(strcmp($addr[1], "query") == 0){
                
                $this->exec();

            }
            $this->html = $this->html. $url;
        }
        return;
    }
    public function exec(){
        global $dbcon;

        $postfx = array(
            'cache' => '',
            'token' => '',
            'table' => ''
            
        );
        $dbcon->init();
        if($this->handle = $dbcon->query($this->handle, "cache", $postfx)){
            if($this->handle->check != 'OK'){ 

            } 
            // return;
        }
        $dbcon->close();
        //echo $this->handle->check;
        if(strcmp($this->handle->check,"error")==0){
            echo "404 not found!";
            return;
        }
        echo json_encode($this->handle);
    }
    public function run(){
        
    }
}
return;
?>
