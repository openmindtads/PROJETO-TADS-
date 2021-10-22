<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="widht-device-widht, initial-scale=1.0">
        <title>ChatBot Covid</title>
        <link rel="stylesheet" href="estilo.css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    </head>
    <body>
        <div class="Layout">
            <div class="title">Central de dúvidas Coronavírus</div>
            <div class="msgchat">
                <div class="bot-inbox inbox">
                    <div class="icon">
                     <img src="medica.png" alt="">
                    </div>
                    <div class="msg-header">
                        <p>Olá! Eu sou a Dr. Becca. E estou aqui para te ajudar nas dúvidas sobre o Coronavírus.</p>
                    </div>
                </div>  
            </div>
            <div class="rodape">
                <div class="input-data">
                    <input id="caixa-texto" type="text" placeholder="Digite aqui..." required>
                    <button id="enviarbtn"><img src="enviar.png" alt=""></button>
                </div>
            </div>
        </div>
<script>
            $(document).ready(function(){
                $("#enviarbtn").on("click", function(){
                    $value = $("#caixa-texto").val();
                    $msg = '<div class="user-inbox inbox"><div class="msg-header"><p>'+ $value +'</p></div></div>';
                    $(".msgchat").append($msg);
                    $("#caixa-texto").val('');
                    //start ajax code
                    $.ajax({
                        url: 'message.php',
                        type: 'POST',
                        data: 'text='+$value,
                        success: function(result){
                            $replay = '<div class="bot-inbox inbox"><div class="icon"><img src="medica.png" alt=""></div><div class="msg-header"><p>'+ result +'</p></div></div>';
                            $(".msgchat").append($replay);
                            $(".msgchat").scrollTop($(".msgchat")[0].scrollHeight);
                        }
                    });
                });
            });
        </script>
    </body>
    </html>
