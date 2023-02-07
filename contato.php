<?php
/*
* Template Name: Contato
*/


/*
*inicio dos codigos de emvio do formulario 
*
*/

 get_header();

if (isset($_POST['enviar'])) {
  $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
  $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
  $telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_STRING);
  $assunto = filter_input(INPUT_POST, 'assunto', FILTER_SANITIZE_STRING);
  $mensagem = filter_input(INPUT_POST, 'mensagem', FILTER_SANITIZE_STRING);

  if (empty($nome) || empty($email) || empty($telefone) || empty($assunto) || empty($mensagem)) {
    echo "Por favor, preencha todos os campos obrigatórios.";
  } else {
    $to = "ederdcd@yahoo.com.br";
    $subject = "Novo Contato";
    $message = "Nome: " . $nome . "\n" .
               "Email: " . $email . "\n" .
               "Telefone: " . $telefone . "\n" .
               "Assunto: " . $assunto . "\n" .
               "Mensagem: " . $mensagem . "\n";
    $headers = "From: " . $email . "\r\n" .
               "Reply-To: " . $email . "\r\n" .
               "X-Mailer: PHP/" . phpversion();
    if (mail($to, $subject, $message, $headers)) {
      echo "Mensagem enviada com sucesso!";
    } else {
      echo "Erro ao enviar mensagem.";
    }
  }
}

 ?>
<div class="container mb-3">
    <div class="row justify-content-center">
        <div class="col-8">
            <!-- <form name="formuser" action="enviar.php" method="POST"> -->
                <form name="form_contato" class="form-contato box-shadow pe-3 ps-3 border-2" action="" method="POST" id="formcontato">
                    <fieldset>
                        <!-- Form Name -->
                        <legend class="text-center box-shadow  mb-2 text-uppercase cortitulo">Contato</legend>
                        <div class="row p-0 m-0">
                            <div class="col-12 col-sn-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6  text-justify">
                                <!-- Text input nome-->
                                <div class="input-group input-group-sm mt-1">
                                    <span class="input-group-text" id="inputGroup-sizing-sm"> <i class="fas fa-user"></i> </span>
                                    <input  onkeypress="return blocktext();"id="textinputnome" name="nome"  class="form-control" type="text" title="entre com o seu nome completo"> <br>
                                </div>

                            <!-- Text input e-mail-->
                            <div class="input-group input-group-sm mt-2">
                                <span class="input-group-text" id="inputGroup-sizing-sm"><i class="fas fa-envelope"></i></span>
                                <input  id="email" name="email"  class="form-control " type="email" title="E-mail" >
                            </div>
                            <!-- Text input Telefone-->
                            <div class="input-group input-group-sm mt-2">
                                <span class="input-group-text" id="inputGroup-sizing-sm"><i class="fas fa-phone-square-alt"></i></span>
                                <input  onkeypress="return blocknumber();" id="textinputtelefone" name="telefone" placeholder="coloque um teolefone valido" class="form-control i" type="text" title="telefone" maxlength="15">
                            </div>
                            <!--select assunto -->
                            <div class="input-group input-group-sm mt-2">
                                <span class="input-group-text" for="selectassunto"><i class="fas fa-tasks"></i></span>
                                <select name="assunto"class="form-select" id="selectassunto">
                                  <option value="0">Escolha um assunto:</option>
                                  <option value="1">logos</option>
                                  <option value="2">cartão de visita </option>
                                  <option value="3">arte camisa </option>
                              </select>
                          </div>
                      </div>

                      <div class="col-12 col-sn-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
                       <div class="form-group form-group-md mt-1">
                        <textarea class="form-control" type="textarea" id="textareamensagem" name="mensagem" placeholder="Message" maxlength="200" rows="6"></textarea>
                        <span class="help-block"><p id="contcharacter" class="help-block mb-0 text-center"></p></span>                    
                    </div>
                </div>
            </div>
             <input type="submit" name="enviar" value="Enviar" class="btn btn-primary mb-3 mt-2 btm-enviar" id="btnenviar" onclick="validarcontato()">
        </fieldset>
    </form>
</div>
</div>
</div>
<?php get_footer();?>
