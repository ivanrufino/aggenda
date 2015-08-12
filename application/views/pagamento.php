<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Pagamento</title>
        <script type="text/javascript" src="https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.lightbox.js"></script>
    </head>
    <body>
        <h2>Criando requisi&ccedil;&atilde;o de pagamento</h2>
        <p>Code: <strong><?= $code; ?></strong></p>
        <script>
            PagSeguroLightbox({
                code: '<?= $code; ?>'
            }, {
                success: function (transactionCode) {
                    alert(transactionCode);
                    console.log("success - " + transactionCode);
                },
                abort: function () {
                    alert("abort");
                }
            });
//            PagSeguroLightbox({'<?= $code; ?>'}, 
//            { success: function (transactionCode) {
//                    alert("success - " + transactionCode);
//                },
//                abort: function () {
//                    alert("abort");
//                }
//            });
        </script>
        <?php
        ?>
    </body>
</html>
