<?php
 
// verifica se há algum conteúdoo a ser mostrado na view
// cacela a execução do script caso não haja
 if( !isset($content) ){
	// TODO: definir um status de erro via header

	exit( json_encode([
		'result' => false,  
		'message' => 'conteúdo não definido'
	 ]));
 }
 

 //
 echo json_encode( $content );


