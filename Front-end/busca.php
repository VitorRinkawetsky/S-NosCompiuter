<?php 
//incluir a conexão com o banco
    include_once('conexao.php');

    //recuperaro valor da palavra
    $softwares = $_POST['palavra'];
    //pesquisar no banco de dados nome do software
    $soft = "select * from requisito_software where nome like '%$softwares%'";
    $resultado_softwares = mysqli_query($mysqli, $soft);

    if(mysqli_num_rows($resultado_softwares) <= 0) {
        echo "Nenhum software encontrado...";
    }else{
		while($rows = mysqli_fetch_assoc($resultado_softwares)){
			echo "<li onclick='selecionarItem(this)'>".$rows['nome']."</li>";

           
		}
	}
?>