<?php
session_start();
//var_dump($_SESSION);

?>
<!DOCTYPE html>
<html lang='pt-BR'>

<head>
    <meta charset='utf-8' />
    <meta name=”description” content='Plataforma central da Redepharma'>
    <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
    <link rel='shortcut icon' href='favicon.ico' type='image/x-icon' />
    <title>RedeConecta | Redepharma</title>
    <link href='styles.css' rel='stylesheet'>
</head>
<body>
    <section class='header'>
        <img src="./images/bannerRedeConect.png" style="width: 100%; height: auto;" alt="banner">
    </section>
    <div class='verify'>
        <section class='py-5 text-ligth'>
            <!-- <center><alerta>*Aguardando o cadastro dos funcionários do Financeiro e do Compras<alerta></center> -->
            <div class='valida'>
                <div onclick="location.href='./zerador_de_descontos/zerar_tabela_preco_ifood.php'" class="card-btn">
                    <div class="card-icon">
                        <ion-icon name="cash-outline"></ion-icon>
                    </div>
                    <div class="card-nome">
                        <p>Zerar descontos Ifood</p>
                    </div>
                </div>

                <div onclick="location.href='./zerador_de_descontos/zerar_tabela_preco_rappi.php'" class="card-btn">
                    <div class="card-icon">
                        <ion-icon name="cash-outline"></ion-icon>
                    </div>
                    <div class="card-nome">
                        <p>Zerar descontos Rappi</p>
                    </div>
                </div>

                <div onclick="location.href='set_desc_ifood.php'" class="card-btn">
                    <div class="card-icon">
                        <ion-icon name="cash-outline"></ion-icon>
                    </div>
                    <div class="card-nome">
                        <p>Atualizar Ifood</p>
                    </div>
                </div>
                
                <div onclick="location.href='set_desc_rappi'" class="card-btn">
                    <div class="card-icon">
                        <ion-icon name="cash-outline"></ion-icon>
                    </div>
                    <div class="card-nome">
                        <p>Atualizar Rappi</p>
                    </div>
                </div>

            </div>
        </section>
	</div>
    <!-- Footer -->

    <footer class="footer">
        <div class="blueLine"></div>
        <section>
            <div>
                <div class="colunas" style="padding-top: 30px; padding-bottom: 30px;">
                    <p style="color: #fff">RedePharma © Desenvolvido por: <a style="text-decoration: none; color: #ff7d12;" href="https://github.com/eliabeguerreiro">Eliabe Paz</a>
                     </p>
                </div>
            </div>
        </section>
    </footer>

        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
	</body>
</html>