<?php

class Wp_Abuseshield_Config
{
    protected $config_file;
    public $config;

    public function __construct()
    {
        $this->config_file = plugin_dir_path( __FILE__ ) . "../wp-abuseshield-config.php";
        
        if(!file_exists($this->config_file))
        {
            $this->config = [];
            $this->config["APIKey"] = "";
            $this->config["DVC"] = "";
            $this->config["Secret"] = $this->GenerateSecret();
            $this->config["CacheExpiration"] = 24;
            $this->SaveConfig();
        }
        else
            $this->LoadConfig();
    }

    protected function LoadConfig()
    {
        $config_file_contents = file($this->config_file);
        $this->config = json_decode(base64_decode($config_file_contents[1]), true);
    }

    public function SaveConfig()
    {
        $config_string = "<?php /*\n" . base64_encode(json_encode($this->config));
        return file_put_contents($this->config_file, $config_string);
    }

    public function GenerateSecret()
    {
        return sha1(time()."#".rand(0, 1000000000));
    }

}