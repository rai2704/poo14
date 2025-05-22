<?php
    include_once './inc/header.php';
    require_once './model/categoriasModel.php';

    $objCategorias = new Categorias();

    $categorias = $objCategorias->listar();

    foreach ($categorias as $categoria) {
        echo "<p><h1> ID da Categoria: " . $categoria["id_categoria"]. 
             " - Nome da Categoria : " . $categoria["nome"] . "</h1></p>";
    }



    include_once './inc/footer.php';
?>
