<?php  
require_once "./src/openpay.php";	

$op = new PagoOpenpay();

	  //$ret = $op->pagarConTarjeta($_POST['token_id'],$_POST['ammount'],$_POST['nombre'],$_POST['deviceIdHiddenFieldName'],$_POST['email'],$_POST['phone']);

$ret = $op->pagarConTarjeta("",500,"Juan Vazquez Juarez","","juan.vazquez@empresa.com.mx","4423456723");

if($ret["status"] < 0){
	print_r($ret["error"]);
	print_r("La generación del pago falló");
	return;
}
else{
		$responseJson->status = true;
		$responseJson->msg = "Pago con suceso";
		

		$myJSON = json_encode($responseJson);
		echo $myJSON;
    }
    
?>