<script>
    setInterval(()=>{window.scrollTo(0, document.body.scrollHeight);}, 1)
</script>
<?php

include_once './functions/conexao.php';



try{
    $Conexao = Conexao::getConnection();
                
    $query = $Conexao->query("
    SELECT * FROM ARVORE_APPFARMA WHERE CD_PROD <=10 ORDER BY CD_PROD ASC
    OPTION(maxrecursion 0)
        ");

    $RESULTADO = $query->fetchAll();


}catch(Exception $e){
    echo $e->getMessage();

}

foreach($RESULTADO as $result){
    $valor_tabela = ($result['VLR_TABELA']);
    
    echo("<br> Valor tabelado: ");
    echo$valor_tabela;
    
    echo("<br> Codigo do produto: ");
    echo$result['CD_PROD'];
    echo("<br>");
    echo("<br>");

    //PRODUTO
    try{
        $Conexao = Conexao::getConnection();

        $query = $Conexao->query("
        SELECT PERC_DESC FROM EST_PROD_TBL_DESC_EST_PROD WHERE CD_PROD = ".$result['CD_PROD']." and CD_TBL_DESC = 1315
        ");

        $PRODUTO = $query->fetchAll();

    }catch(Exception $e){
        echo $e->getMessage();
    }


    if($PRODUTO){

        $dividendo = (round($PRODUTO[0][0], 1));
        $divisor = (round($valor_tabela, 1));

        echo$divisor;
        echo("<br>");

        try{
            $resultado = ($divisor / $dividendo);
            $novo_preco = ($valor_tabela-$resultado);
        } catch (DivisionByZeroError $e) {
            $novo_preco = $valor_tabela;
            echo "got by zero";
        } catch (ErrorException $e) {
            $novo_preco = $valor_tabela;
            echo "got exception by zero";
        }
    
        try{
            $Conexao = Conexao::getConnection();
    
            $query = $Conexao->query("
            UPDATE EST_PROD_PRECO_APPFARMA SET VLR_DELIVERY = $novo_preco WHERE CD_PROD = ".$result['CD_PROD']."");

            $query2 = $Conexao->query("
            UPDATE EST_PROD_PRECO_APPFARMA SET TP_DESCONTO = 'CD_PROD' WHERE CD_PROD = ".$result['CD_PROD']."");
           
            $UPDATE = $query->fetchAll();
            
        }catch(Exception $e){
            echo $e->getMessage();
            echo("<br>");
        }

        continue;
        //continue reinicia a interação do foreach
    }
    //FIM PRODUTO
    

    //FAMILIA
    try{
        $Conexao = Conexao::getConnection();

        $query = $Conexao->query("
        SELECT PERC_DESC FROM EST_PROD_TBL_DESC_EST_ARV_MERC_FAMILIA WHERE CD_ARV_MERC_FAMILIA = ".$result['CD_ARV_MERC_FAMILIA']." and CD_TBL_DESC = 1315
        ");

        $FAMILIA = $query->fetchAll();

    }catch(Exception $e){
        echo $e->getMessage();
    }
    
    if($FAMILIA){
        
        $dividendo = (round($FAMILIA[0][0], 1));
        $divisor = (round($valor_tabela, 1));
        echo$divisor;
        echo("<br>");
    
    
        try{
            $resultado = ($divisor / $dividendo);
            $novo_preco = ($valor_tabela-$resultado);
        } catch (DivisionByZeroError $e) {
            $novo_preco = $valor_tabela;
            echo "got by zero";
        } catch (ErrorException $e) {
            $novo_preco = $valor_tabela;
            echo "got exception by zero";
        }
    
        try{
            $Conexao = Conexao::getConnection();
    
            $query = $Conexao->query("
            UPDATE EST_PROD_PRECO_APPFARMA SET VLR_DELIVERY = $novo_preco WHERE CD_PROD = ".$result['CD_PROD']."");
            $query2 = $Conexao->query("
            UPDATE EST_PROD_PRECO_APPFARMA SET TP_DESCONTO = 'CD_ARV_MERC_FAMILIA' WHERE CD_PROD = ".$result['CD_PROD']."");
    
            $UPDATE1 = $query->fetchAll();
            $UPDATE2 = $query2->fetchAll();
    
        }catch(Exception $e){
            echo $e->getMessage();
            echo("<br>");
        }


        continue;
    }
    //FIM FAMILIA

    
    //MARCA
    try{
        $Conexao = Conexao::getConnection();

        $query = $Conexao->query("
        SELECT PERC_DESC FROM EST_PROD_TBL_DESC_EST_MC WHERE CD_MC = ".$result['CD_MC']." and CD_TBL_DESC = 1315
        ");

        $MARCA = $query->fetchAll();

    }catch(Exception $e){
        echo $e->getMessage();
    }


    if($MARCA){

        $dividendo = (round($MARCA[0][0], 1));
        $divisor = (round($valor_tabela, 1));
        echo$divisor;
        echo("<br>");
    
        try{
            $resultado = ($divisor / $dividendo);
            $novo_preco = ($valor_tabela-$resultado);
        } catch (DivisionByZeroError $e) {
            $novo_preco = $valor_tabela;
            echo "got by zero";
        } catch (ErrorException $e) {
            $novo_preco = $valor_tabela;
            echo "got exception by zero";
        }
    
        try{
            $Conexao = Conexao::getConnection();
    
            $query = $Conexao->query("
            UPDATE EST_PROD_PRECO_APPFARMA SET VLR_DELIVERY = $novo_preco WHERE CD_PROD = ".$result['CD_PROD']."");
            $query2 = $Conexao->query("
            UPDATE EST_PROD_PRECO_APPFARMA SET TP_DESCONTO = 'CD_MC' WHERE CD_PROD = ".$result['CD_PROD']."");
    
            $UPDATE1 = $query->fetchAll();
            $UPDATE2 = $query2->fetchAll();
    
        }catch(Exception $e){
            echo $e->getMessage();
            echo("<br>");
        }


    continue;

    }
    //FIM MARCA


    //FABRICANTE
    try{
        $Conexao = Conexao::getConnection();

        $query = $Conexao->query("
        SELECT PERC_DESC FROM EST_PROD_TBL_DESC_EST_PROD_FABRIC WHERE CD_FABRIC = ".$result['CD_FABRIC']." and CD_TBL_DESC = 1315
        ");

        $FABRICANTE = $query->fetchAll();

    }catch(Exception $e){
        echo $e->getMessage();
    }

    if($FABRICANTE){

        $dividendo = (round($FABRICANTE[0][0], 1));
        $divisor = (round($valor_tabela, 1));
        echo$divisor;
        echo("<br>");
    
    
        try{
            $resultado = ($divisor / $dividendo);
            $novo_preco = ($valor_tabela-$resultado);
        } catch (DivisionByZeroError $e) {
            $novo_preco = $valor_tabela;
            echo "got by zero";
        } catch (ErrorException $e) {
            $novo_preco = $valor_tabela;
            echo "got exception by zero";
        }
    
        try{
            $Conexao = Conexao::getConnection();
    
            $query = $Conexao->query("
            UPDATE EST_PROD_PRECO_APPFARMA SET VLR_DELIVERY = $novo_preco WHERE CD_PROD = ".$result['CD_PROD']."");
            $query2 = $Conexao->query("
            UPDATE EST_PROD_PRECO_APPFARMA SET TP_DESCONTO = 'CD_FABRIC' WHERE CD_PROD = ".$result['CD_PROD']."");
    
            $UPDATE1 = $query->fetchAll();
            $UPDATE2 = $query2->fetchAll();
    
        }catch(Exception $e){
            echo $e->getMessage();
            echo("<br>");
        }

        continue;
    }
    //FIM FABRICANTE


    //CATEGORIA
    try{
        $Conexao = Conexao::getConnection();

        $query = $Conexao->query("
        SELECT PERC_DESC FROM EST_PROD_TBL_DESC_EST_ARV_MERC_CATEGORIA WHERE CD_ARV_MERC_CATEG = ".$result['CD_ARV_MERC_CATEG']." and CD_TBL_DESC = 1315
        ");

        $CATEGORIA = $query->fetchAll();

    }catch(Exception $e){
        echo $e->getMessage();
    }

    if($CATEGORIA){
        $dividendo = (round($CATEGORIA[0][0], 1));
        $divisor = (round($valor_tabela, 1));
        echo$divisor;
        echo("<br>");
    
    
        try{
            $resultado = ($divisor / $dividendo);
            $novo_preco = ($valor_tabela-$resultado);
        } catch (DivisionByZeroError $e) {
            $novo_preco = $valor_tabela;
            echo "got by zero";
        } catch (ErrorException $e) {
            $novo_preco = $valor_tabela;
            echo "got exception by zero";
        }
    
        try{
            $Conexao = Conexao::getConnection();
    
            $query = $Conexao->query("
            UPDATE EST_PROD_PRECO_APPFARMA SET VLR_DELIVERY = $novo_preco WHERE CD_PROD = ".$result['CD_PROD']."");
            $query2 = $Conexao->query("
            UPDATE EST_PROD_PRECO_APPFARMA SET TP_DESCONTO = 'CD_ARV_MERC_CATEG' WHERE CD_PROD = ".$result['CD_PROD']."");
    
            $UPDATE1 = $query->fetchAll();
            $UPDATE2 = $query2->fetchAll();
    
        }catch(Exception $e){
            echo $e->getMessage();
            echo("<br>");
        }
    
        continue;
    }

    //FIM CATEGORIA




    //LINHA

    try{
        $Conexao = Conexao::getConnection();

        $query = $Conexao->query("
        SELECT PERC_DESC FROM EST_PROD_TBL_DESC_EST_ARV_MERC_LINHA WHERE CD_ARV_MERC_LINHA = ".$result['CD_ARV_MERC_LINHA']." and CD_TBL_DESC = 1315
        ");

        $LINHA = $query->fetchAll();

    }catch(Exception $e){
        echo $e->getMessage();
    }

    if($LINHA){
        $dividendo = (round($LINHA[0][0], 1));
        $divisor = (round($valor_tabela, 1));
        echo$divisor;
        echo("<br>");
    
    
        try{
            $resultado = ($divisor / $dividendo);
            $novo_preco = ($valor_tabela-$resultado);
        } catch (DivisionByZeroError $e) {
            $novo_preco = $valor_tabela;
            echo "got by zero";
        } catch (ErrorException $e) {
            $novo_preco = $valor_tabela;
            echo "got exception by zero";
        }
    
        try{
            $Conexao = Conexao::getConnection();
    
            $query = $Conexao->query("
            UPDATE EST_PROD_PRECO_APPFARMA SET VLR_DELIVERY = $novo_preco WHERE CD_PROD = ".$result['CD_PROD']."");
            $query2 = $Conexao->query("
            UPDATE EST_PROD_PRECO_APPFARMA SET TP_DESCONTO = 'CD_ARV_MERC_LINHA' WHERE CD_PROD = ".$result['CD_PROD']."");
    
            $UPDATE1 = $query->fetchAll();
            $UPDATE2 = $query2->fetchAll();
    
        }catch(Exception $e){
            echo $e->getMessage();
            echo("<br>");
        }

        continue;
    }

    

}
echo("<h1>DESCONTOS APPFARMA ATUALIZADOS!</h1>");