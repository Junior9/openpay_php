<?php  
require_once "./vendor/openpay/sdk/Openpay.php";	

	class PagoOpenpay{
		private $op;

		public function __construct(){
		
	        $this->op = Openpay::getInstance('', '');    
	      }


	      public function pagarConTarjeta($tokenId,$cantidad,$nombre,$idDispositivo,$email,$telefono){

	      $customer = array(
	      	'name' => $nombre,
	      	'phone_number' => $telefono,
	      	'email' => $email
	      );
	      $chargeData = array(
	      	'method' => 'card',
	      	'source_id' => $tokenId,
	      	'amount' => (float)$cantidad,
	      	'device_session_id' => $idDispositivo,
	      	'customer' => $customer
	      );
	      $charge = null;
	      $errorMsg = null;
	      $errorCode = null;
	      try{
	      	$charge = $this->op->charges->create($chargeData);
	      }
	      catch(Exception $e){
	      	$errorMsg = $e->getMessage();
	      	$errorCode =  $e->getCode();
	      }
	      $status = null;
	      if($errorMsg !== null || $errorCode !== null){
	      	$errorMsg = $this->getError($errorCode);
	      	$status = array("status"=>-1,"error" =>$errorMsg,"errorCode" => $errorCode);
	      }
	      else
	      	$status = array("status"=>0,"error"=>"ok","errorCode" => -1);
	      return $status;
	      //$status Tendrá siempre dos elementos "status" y "error". "status":= -1 cuando hay un error "status":= 0 cuando todo esta correcto. El mensaje de error lo encuentras en el segundo elemento "error"
	  }
	}
?>