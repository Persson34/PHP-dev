<?php
	class SimpleClass{
		/**
			Class member variables.
		*/
		private $inputs;
		private $hostname;
		private $protocol;	//default is http
		private $path;
		
		/**
			Constructor
		*/
		public function __construct($url){
			if($url != ''){
				$this->inputs = $url;	
			
				/**
					initialize member variable.
				*/	
				//protocal
				if(parse_url($url, PHP_URL_SCHEME) == ''){
					$this->protocol = "http";
				}else{
					$this->protocol = parse_url($url, PHP_URL_SCHEME);
				}
				//hostname
				if(parse_url($url, PHP_URL_HOST) == ''){
					$this->hostname = "";
				}else{
					$this->hostname = parse_url($url, PHP_URL_HOST);
				}
				//path
				if(parse_url($url, PHP_URL_PATH) == ''){
					$this->path = "";
				}else{
					$this->path = parse_url($url, PHP_URL_PATH);
				}
				
				//normalize the path of the URL on instantiation.
				$this->path = str_replace("../", "/", $this->path);
				$this->path = str_replace("./", "/", $this->path);
				
				
			}
		}
		
		/**
			convert to string.
		*/
		
		public function  __toString(){
			return $this->inputs;
		}
		
		/**
			Getter for hostname
		*/
		public function getHostname(){
			return $this->hostname;
		}
		
		/**
			Getter for path
		*/
		public function getPath(){
			
			
			return $this->path;
		}
		
		/**
			Getter for protocol
		*/
		public function getProtocal(){
			return $this->protocol;
		}
		
	}
	
	$obj = new SimpleClass("http://google.com/dhasjkdas/sadsdds/sdda/sdads.html");
	//$obj = new SimpleClass("./tshirts?color=red#size");
	
	echo "Output for protocal.". "<br/>";
	echo $obj->getProtocal();
	echo "<br/><br/>";
	
	echo "Output for host.". "<br/>";
	echo $obj->getHostname();
	echo "<br/><br/>";
	
	echo "Output for path.". "<br/>";
	echo $obj->getPath();
	echo "<br/><br/>";
	
	echo "Output for String.". "<br/>";
	echo $obj;
	echo "<br/><br/>";
	
	echo phpinfo();
	
	
?>