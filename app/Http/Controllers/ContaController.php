<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Conta;

class ContaController extends Controller
{
 

 
public function contas(){

	try {
	
	$conta= Conta::all();
		
	} catch (Exception $e) {

		return $e->getMessage();
	}


    return view('contas.contas')->with(compact('conta'));
}



public function creditar($id, $valor){
   
    try {

     $contaAtual = Conta::find($id);
     $contaAtual->saldo = floatval($valor) + floatval($contaAtual->saldo);
     $contaAtual->save();	
     $resultJSON= array("valor"  => $contaAtual->saldo);
     $resultJSON = json_encode($resultJSON);
     	
     } catch (Exception $e) {
        $resultJSON=$e->getMessage();
     } 
    return $resultJSON;
}


public function debitar($id,$valor){
     try {

     $contaAtual = Conta::find($id);
     $contaAtual->saldo = floatval($contaAtual->saldo) - floatval($valor);
     $contaAtual->save();	
     $resultJSON= array("valor"  => $contaAtual->saldo);
     $resultJSON = json_encode($resultJSON);
     	
     } catch (Exception $e) {
        $resultJSON=$e->getMessage();
     } 
    return $resultJSON;
}
}


