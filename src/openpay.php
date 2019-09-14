<?php  
require_once "./vendor/openpay/sdk/Openpay.php";	

	class PagoOpenpay{
		private $op;

		public function __construct(){
		
	        $this->op = Openpay::getInstance('m8sqkijxlviacxkxgzjm', 'sk_2bbbbd611d3f4a16a555af20de49fe57');    
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
	      	$status = array("status"=>true);
	      return $status;
	  }
	}
?>