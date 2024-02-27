<?php


class cc_mysqli {
    private $var;

    
    public $count;
    public $cssql;

    public $files;
    public $fdmvc;
    public $appvc;

    function __construct(){
        $this->count=0;
        $this->files = array(
                        'file'        => '',
                        'response'    => '503',
                        'header'      => '',
                        'header_size' => '',
                        'type'        => '',
                        'body_size'   => '',
                        'title'       => '',
                        'body'        => ''
                );
        $this->cssql = 0;
    }
    public function install(){
        
    }
    public function unstall(){
        
    }
    public function init($dbname = 'default'){
        
    }
    public function close(){

    }    
    public function clean($token){
        echo "check token : [". $token . "] please wait 2 hour</br>";
    }
    public function cache($handle, $ctrl, $value){
        $handle['check'] = "Padding";
        
        $table_main = sprintf("tb_primary", $this->cssql);
        
        $this->clean($value['data']['token']);
        
        $txt = sprintf("tb_%012X", $this->cssql);

        $date   = date("Y/m/d");
        $time   = date('H/i/s');
        $date_time = $date .'_'. $time .'_lexne';

        $handle['table']   = $txt;
        $handle['request'] = $value['curl'];
        $handle['token']   = hash('sha256', $date_time);
        

        $handle->lists  = array();
        //var_dump($handle);
         //= sprintf("There are %u million bicycles in %s.",$number,$str);

        return $handle;
    }
    public function control($handle, $ctrl, $value){
        
        if(strcmp($ctrl, "update") ==0){
            echo "update windows .</br>";

            //var_dump($value);
        }
        return $handle;
    }
    public function query($handle, $ctrl, $value){
        $handle['check'] = "OK";

        $i = 0;

        $this->appvc = array();

        for($i=0;$i<10;$i++){
            
            $this->files->file = "image/".$this->count;
            $this->fdmvc = array(
                        'files_'.$this->count => $this->files
                );
            
            $chk = array_push($this->appvc, $this->fdmvc);
            $this->count++;
            
            //var_dump($this->fdmvc);
        }
        
        $handle['lists'] = $this->appvc;
        //var_dump($this->appvc);
        //var_dump( $this->files);
        //echo "test:". $this->count ."_". $chk ."</br>";
        //var_dump($handle['lists']);

        return $handle;
    }
}

$dbcon = new cc_mysqli();

return;

?>

