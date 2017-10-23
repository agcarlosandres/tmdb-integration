<?php 
require_once("../Bo/Person.php");
require_once("../Assamble/AssambleData.php");
require_once("../Assamble/ArrayUtils.php");

$Person = new Person();
$AssambleData = new AssambleData();

$Person->loadMovies($_GET['data']);

if($Person->ErrorCurl==0)
{	
 	$ArrayUtils = new ArrayUtils();

	foreach($Person->QueryCredits->cast as $item)
	{
		$ArrayUtils->agregarElemento(array("original_title"=>$item->original_title,"backdrop_path"=>$item->backdrop_path,"poster_path"=>$item->poster_path,"overview"=>$item->overview,"release_date"=>$item->release_date),false);
	}
	
 	$ArrayUtils->setOrden('release_date','Asc');
 	$ArrayUtils->ordenar();
 	
	$out = $AssambleData->assambleData($Person->QueryPerson,$ArrayUtils->verArray(),false);
}else{
	$out=$AssambleData->assambleData(false,false,$Person->ErrorCurl);
}

print $out;

?>