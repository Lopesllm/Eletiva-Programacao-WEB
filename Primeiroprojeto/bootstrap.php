<?php

require __DIR__."/vendor/autoload.php";

$metodo = $_SERVER['REQUEST_METHOD'];
$caminho = $_SERVER['PATH_INFO'] ?? '/';

$r = new Php\Primeiroprojeto\Router($metodo, $caminho);

#ROTAS

$r->get('/olamundo', function (){
    return "Olá mundo!";
} );

$r->get('/olapessoa/{nome}', function($params){
    return 'Olá '.$params[1];
} );

$r->get('/exem1/formulario', function(){
    include("exem1.html");
} );

$r->post('/exem1/resposta', function(){
    $valor1 = $_POST['valor1'];
    $valor2 = $_POST['valor2'];
    $soma = $valor1 + $valor2;
    return "A soma é: {$soma}";
});

$r->get('/exer1/formulario', function(){
    include("exer1.html");
} );

$r->post('/exer1/resposta', function(){
    $numero = $_POST['numero'];
    if($numero > 0)
        return "Valor Positivo";
    elseif($numero < 0)
        return "Valor Negativo";
    else
        return "Igual a Zero";
    
});

$r->get('/exer2/formulario', function(){
    include("exer2.html");
} );

/* $r->get('/exer3/formulario', function(){
    include("exer3.html");
} );

$r->get('/exer4/formulario', function(){
    include("exer4.html");
} );

$r->get('/exer5/formulario', function(){
    include("exer5.html");
} );

$r->get('/exer6/formulario', function(){
    include("exer6.html");
} );

$r->get('/exer7/formulario', function(){
    include("exer7.html");
} );

$r->get('/exer8/formulario', function(){
    include("exer8.html");
} );

$r->get('/exer9/formulario', function(){
    include("exer9.html");
} );

$r->get('/exer10/formulario', function(){
    include("exer10.html");
} );
 */
#ROTAS

$resultado = $r->handler();

if(!$resultado){
    http_response_code(404);
    echo "Página não encontrada!";
    die();
}

echo $resultado($r->getParams());


