<?php
include "./Classes/Conexao.php";
include "./Classes/DAO/UsuarioDAO.php";

if ($_GET){
    $codigo = $_GET['codigo'];
    $UsuarioDAO = new UsuarioDAO();

    $consulta = $UsuarioDAO->consultarEndereco($codigo);

    if ($consulta == true){
      if (mysqli_num_rows($consulta) != 0){
        for ($i = 0; $i < mysqli_num_rows($consulta); $i++){
          $linha = mysqli_fetch_array($consulta);

          $respostas [] = array(
            'id' => $linha['id'],
            'nome' => $linha['nome'],
            'sobrenome' => $linha['sobrenome'],
            'idade' => $linha['idade'],
            'sexo' => $linha['sexo'],
            'logradouro' => $linha['logradouro'],
            'cidade' => $linha['cidade'],
            'estado' => $linha['estado'],
            'pais' => $linha['pais']
          );
        }
        echo json_encode($respostas);
      } else {
        echo "Codigo nao existente!";
      }
    }

} else {
  echo 'Nenhum codigo selecionado!';
}
