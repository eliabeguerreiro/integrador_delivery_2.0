<?php
include_once './functions/conexao.php';
?>

<a href="?loja=57">Zerar Preços RAPPI R57</a></p>
<a href="?loja=66">Zerar Preços RAPPI R66</a></p>

<?php
if($_GET){


    if($_GET['loja'] == 57){
        
        try{
            $Conexao = Conexao::getConnection();
                        
            $query = $Conexao->query("
            SELECT * FROM ARVORE_RAPPI_57  ORDER BY CD_PROD ASC
            OPTION(maxrecursion 0)
                ");
    
            $query2 = $Conexao->query("
            TRUNCATE TABLE EST_PROD_PRECO_RAPPI57
                ");
            
    
            $RESULTADO = $query->fetchAll();
    
    
        }catch(Exception $e){
            echo $e->getMessage();
    
        }
    
    
        foreach($RESULTADO as $result){
    
    
            try{
                $Conexao = Conexao::getConnection();
                            
                $query = $Conexao->query("
                    INSERT INTO EST_PROD_PRECO_RAPPI57 (CD_PROD, CD_FILIAL, VLR_DELIVERY, TP_DESCONTO) VALUES (".$result['CD_PROD'].", 57, 0, 'NULL')");
            
                $LINHA = $query->fetchAll();
            
            
            }catch(Exception $e){
                echo $e->getMessage();
            
            }
            echo("<br>");
            echo$result['CD_PROD'];
            //fim do foreach
    
        }
    
    
        echo("<h1>DESCONTOS R57 ZERADOS!</h1>");
    



    }elseif($_GET['loja'] == 66){
        


        try{
            $Conexao = Conexao::getConnection();
                        
            $query = $Conexao->query("
            SELECT * FROM ARVORE_RAPPI_66  ORDER BY CD_PROD ASC
            OPTION(maxrecursion 0)
                ");
    
            $query2 = $Conexao->query("
            TRUNCATE TABLE EST_PROD_PRECO_RAPPI66
                ");
            
    
            $RESULTADO = $query->fetchAll();
    
    
        }catch(Exception $e){
            echo $e->getMessage();
    
        }
    
    
        foreach($RESULTADO as $result){
    
    
            try{
                $Conexao = Conexao::getConnection();
                            
                $query = $Conexao->query("
                    INSERT INTO EST_PROD_PRECO_RAPPI66 (CD_PROD, CD_FILIAL, VLR_DELIVERY, TP_DESCONTO) VALUES (".$result['CD_PROD'].", 66, 0, 'NULL')");
            
                $LINHA = $query->fetchAll();
            
            
            }catch(Exception $e){
                echo $e->getMessage();
            
            }
            echo("<br>");
            echo$result['CD_PROD'];
            //fim do foreach
    
        }
    
    
        echo("<h1>DESCONTOS R66 ZERADOS!</h1>");





















    }
}


/*








    
    
    try{
        $Conexao = Conexao::getConnection();
                    
        $query = $Conexao->query("
        SELECT * FROM ARVORE_RAPPI ORDER BY CD_PROD ASC
        OPTION(maxrecursion 0)
            ");

        $query2 = $Conexao->query("
        TRUNCATE TABLE EST_PROD_PRECO_DELIVERY
            ");
        

        $RESULTADO = $query->fetchAll();


    }catch(Exception $e){
        echo $e->getMessage();

    }


    foreach($RESULTADO as $result){


        try{
            $Conexao = Conexao::getConnection();
                        
            $query = $Conexao->query("
                INSERT INTO EST_PROD_PRECO_DELIVERY (CD_PROD, CD_FILIAL, VLR_DELIVERY, TP_DESCONTO) VALUES (".$result['CD_PROD'].", 10, 0, 'NULL')");
        
            $LINHA = $query->fetchAll();
        
        
        }catch(Exception $e){
            echo $e->getMessage();
        
        }
        echo("<br>");
        echo$result['CD_PROD'];
        //fim do foreach

    }


    echo("<h1>DESCONTOS ATUALIZADOS!</h1>");



}
*/