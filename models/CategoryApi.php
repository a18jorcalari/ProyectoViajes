<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: text/html; charset-utf-8");
error_reporting(-1);
ini_set('display_errors','On');

require_once('Category.php');

$category = new Category();

//Select 
if($_REQUEST['query']==0){
    
    foreach($category-> selectExistsCategory($_REQUEST['name']) as $value){
        if($value==1) "Ya existe una categoria con ese nombre";
        else {$category->insert($_REQUEST['name']); echo "Categoria creada correctamente";}
    }
}

else if($_REQUEST['query']==1){

    foreach($category-> selectExistsCategory($_REQUEST['id_category']) as $value){
        if($value==1) "Ya existe una categoria con ese nombre";
        else {$category->update($_REQUEST['name'], $_REQUEST['id_category']); echo "Categoria modificada correctamente";}
    }
<<<<<<< Updated upstream
}

else if($_REQUEST['query']==2){

    $category -> delete($_REQUEST['id_category']);

=======
} 

else if($_REQUEST['query']==2){

    $category -> delete($_REQUEST['id_category']);

>>>>>>> Stashed changes
    foreach($category->selectExistsCategory($_REQUEST['id_category']) as $value){
        if($value==1) echo "Algo ha salido mal";
        else{ echo "Categoria eliminado correctamente";}
        
    }
<<<<<<< Updated upstream
=======
}

else if($_REQUEST['query']==3){

    echo json_encode($category -> selectById($_REQUEST['id_category']));
}

else if($_REQUEST['query']==4){

    echo json_encode($category -> select());
>>>>>>> Stashed changes
}

else if($_REQUEST['query']==3){

    echo json_encode($category -> selectById($_REQUEST['id_category']));
}



?>