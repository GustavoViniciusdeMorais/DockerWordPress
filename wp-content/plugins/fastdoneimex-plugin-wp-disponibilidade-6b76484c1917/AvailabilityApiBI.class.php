<?php
	
	class AvailabilityApiBI{
		private $body;
		private $endpoint = 'https://bi.appfacilita.com/api/v1/analyses?report=';
		private $instance;
		private $productId;
		private $defaultData = [
			'token' => 'eyJpbnN0YW5jZSI6InN1YWVtcHJlc2EiLCJkYXRlIjoiMDIvMDgvMjAyMCJ9.ddb604342e162709c682674d94c9ce7d',
			'instance' => 'suaempresa'
		];

		public function __construct($idProduct, $instance){
			date_default_timezone_set('America/Sao_Paulo');

			$this->instance = $instance;
			$this->productId = $idProduct;
			
		}

		public function getDataProduct($idProduct){

			return [
				'instance' => $this->instance,
				'product' => $this->getProduct($idProduct),
				'units' => $this->getUnits($idProduct),
				'nextUpdate' =>$this->getNextWindowUpdate()
 			];
		}

		public function getNextWindowUpdate(){
			$windowUpdate = ['08', '13', '18'];
			$currentHour = date('H');
			$nextHour = 0;

			foreach($windowUpdate AS $val){
				if($currentHour < $val){
					$nextHour = $val;
				}
			}

			if($nextHour == 0){
				return date("d/m/y à\s ", strtotime("+1 day")) . "{$windowUpdate[0]}:00h";
			}else{
				return date("d/m/y à\s {$val}:00\h");
			}
		}

		/**
		* Load All Units from Specific Product
		*/
		public function getUnits($idProduct){
			$this->connect('bi_lista_unidades_disponibilidade');
		
			$result = array_filter($this->result(), function($item) use ($idProduct){
			    return $item['id_empreendimento'] == $idProduct;
			});

			if(count($result) > 0){
				sort($result);
				return $result;
			}
			
			return false;
		}

		/**
		* Load Specific Product
		*/
		public function getProduct(){
			$this->connect('bi_lista_empreendimentos_disponibilidade');
		
			$result = array_filter($this->result(), function($item){
			    return $item['id_empreendimento'] == $this->productId;
			});

			if(count($result) > 0){
				sort($result);
				return $result[0];
			}
			
			return false;
		}

		/**
		* Load List of Products
		*/
		public function listProducts(){
			$this->connect('bi_lista_empreendimentos');

			return $this->result();
		}

		//Generate Token for Instances
		private function generateToken(){
			$dateCurrent = date('Ymdhi');
			return base64_encode("{\"instance\":\"{$this->instance}\",\"date\":\"{$dateCurrent}\"}") . '.' . md5("data_BI_oll_{$this->instance}");
		}

		// Function to Connect Remote Host Or APi
		private function connect( $report, $args = [], $mode = 'GET') {
		    $http = _wp_http_get_object();
		    $args = array_merge($args, [
		    	'method' => $mode,
		    	'headers' => [
		    		'facilita_token' => $this->generateToken(),
		    		'facilita_instance' => $this->instance,
		    	]
		    ]);

		    $this->body = $http->request( $this->endpoint . $report, $args );
		    return $this->body;
		}

		// Function For retrieve information after requestered by "connect" function
		private function result($arrayMode = true){
			$body = wp_remote_retrieve_body($this->body);

			return ($arrayMode)? json_decode($body, true) : $body;
		}
	}