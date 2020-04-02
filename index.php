<!--    AUTOR: CARLOS EMANNOEL-->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css?family=Asap&display=swap" rel="stylesheet">   
      <link rel="stylesheet" href="css/gerador.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Carlos - booklet generator  </title>
</head>
<body>
    <div class="todo"> 
        <div class="opcoes">
           <div class="headerTop"></div>
            <form action="actionsGetDate.php" method="post" class="formulario">  
                
                    <h1 class="titulo">Informações do Contrato</h1>

                    <input type="text" name="nome" placeholder="Nome do Cliente*" required> 

                    <input type="text"  name="ender" placeholder="Endereço do Cliente*" requered>  <br>

                    <input type="text" name="cidade" placeholder="Cidade do Cliente*" required> 

                    <input type="text" name="obs" placeholder="Observações"> <br>

                    <input type="number" name="qua_parc" placeholder="Quantidade de parcelas*" requered> 

                    <input type="number" name="valor" placeholder="Valor de Cada parcela*" requered> <br>

                    <input type="date" name="data" placeholder="Data de Vencimento*" requered> 

                    <input type="text" name="nomeV" placeholder="Nome do Vendedor*" required> <br>

                    <input type="text" name="localP" placeholder="Local de Pagamento*" required> 

                    <input type="tell" name="tell" placeholder="Telefone do Vendedor*" required> <br>

                    <input type="text" name="title" placeholder="Titulo do Carnê" required> <br>
                    
                    <input type="submit" name="Gerar" value="Gerar" class="btn"> 
            </form> 
        </div>
    </div>
</body>
</html>