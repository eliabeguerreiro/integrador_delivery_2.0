<?php
session_start();



if($_GET){

    echo('abriu')

    ?>
    <div onclick="autoDevolucao()" id='gatilho'></div>

    <script>
        window.onload = ()=>{window.close();}
    </script>
    
    <?php

}else{
?>
    <div onclick="autoDevolucao()" id='gatilho'>
    </div>
    
    <script>
    btnTrigger = document.getElementById('gatilho');
    
    function autoDevolucao() {
        location.href="./automatizador.php?update=yes"
    }

    window.onload = ()=>{btnTrigger.click();}
</script>
<?php
}