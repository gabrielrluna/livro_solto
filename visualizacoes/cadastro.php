<?php
use Projeto\Usuario;

if( isset($_GET['acesso_proibido'])){
	$feedback = "Você deve logar primeiro!";
} elseif ( isset($_GET['campos_obrigatorios'])) {
	$feedback = 'Você deve preencher os dois campos!';
} elseif ( isset($_GET['senha_incorreta'])){
	$feedback = 'Senha Incorreta!';
} elseif ( isset($_GET['logout'])){
	$feedback = 'Você saiu do sistema';
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Faça seu cadastro para liberar ou conseguir um livro">
    <meta name="keywords" content="Cadastrar conta, criar conta">
    <title>Livro Solto - Cadastro</title>
    <link rel="shortcut icon" href="../imagens/logo-e-favicon/favicon-16x16.png" type="image/x-icon">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="estilo.css">
    <link href="signin.css" rel="stylesheet">
    </head>


<body style="background-color: #F2C335">

  <main>
    <section>
      <div class="container py-4 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col col-xl-10">
            <div class="card" style="border-radius: 1rem;">
              <div class="row g-0">
                <div class="col-md-6 col-lg-5 d-none d-md-block">
                  <img src="../imagens/login_e_cadastro/rapaz-com-livro.jpg"
                    alt="Rapaz de cabelo levemente cacheado e loiro, bigode, com um livro nas mãos enquanto olha fixamente para a frente" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
                </div>
                <div class="col-md-6 col-lg-7 d-flex align-items-center">
                  <div class="card-body p-4 p-lg-5 text-black">
    
                    <form>
    
                      <div class="d-flex align-items-center mb-3 pb-1">
                        <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                        <span class="h1 fw-bold mb-0"><a href="index.php"><img src="../imagens/logo-e-favicon/Logo-sem-fundo-2.png" alt="Letra L com bordas arredondas seguida de Livro Solto, indicando o logo do site" width="25%"></a></span>
                      </div>
    
                      <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Crie sua conta</h5>
    
                      <div class="form-outline mb-2">
                        <input type="name" id="form2Example17" class="form-control form-control-lg" />
                        <label class="form-label" for="form2Example17" id="nome">Nome</label>
                      </div>

                      <div class="form-outline mb-2">
                        <input type="email" id="form2Example17" class="form-control form-control-lg" />
                        <label class="form-label" for="form2Example17" id="email">Email</label>
                      </div>
    
                      <div class="form-outline mb-2">
                        <input type="password" id="form2Example27" class="form-control form-control-lg" />
                        <label class="form-label" for="form2Example27" id="senha">Senha</label>
                      </div>
                      <div class="form-outline mb-2">
                        <input type="password" id="form2Example27" class="form-control form-control-lg" />
                        <label class="form-label" for="form2Example27" id="confirma-senha">Confirmar senha</label>
                      </div>
 
                     <div class="pt-1 mb-4">
                      <select class="form-select mb-2" aria-label="Default select example" id="senac">
                      <option selected>Escolha a sua unidade do Senac</option>
                      <option value="1">Aclimação</option>
                      <option value="2">Francisco Matarazzo</option>
                      <option value="3">Guarulhos - Celestino</option>
                      <option value="4">Guarulhos - Faccini</option>
                      <option value="5">Itaquera</option>
                      <option value="6">Jabaquara</option>
                      <option value="7">Jardim Primavera</option>
                      <option value="8">Lapa - Faustolo</option>
                      <option value="9">Lapa - Scipião</option>
                      <option value="10">Lapa - Tito</option>
                      <option value="11">Largo Treze</option>
                      <option value="12">Nações Unidas</option>
                      <option value="13">Osasco</option>
                      <option value="14">Penha</option>
                      <option value="15">Santana</option>
                      <option value="16">Santo André</option>
                      <option value="17">São Bernardo do Campo</option>
                      <option value="18">São Miguel Paulista</option>
                      <option value="19">Taboão da Serra</option>
                      <option value="20">Tatuapé - Cel. Luís Americano</option>
                      <option value="21">Tatuapé - Serra de Bragança</option>
                      <option value="22">Tiradentes</option>
                      <option value="23">Vila Prudente</option>


                      </select>

                      <a href="login.php"><button class="btn btn-lg btn-block btn-cadastro" type="button" id="cadastrar">Cadastrar</button></a>
                      </div>
    
                      <a href="login.php">
                        <p class="mb-2 pb-lg-2">Já possui cadastro? Faça Login</p>
                      </a>
                      <a class="small text-muted termos mx-3" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">Termos de uso</a>
                      <a href="#!" class="small text-muted privacidade" type="button" data-bs-toggle="modal" data-bs-target="#exampleModalDois">Política de privacidade</a>
                    </form>
    
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>

  <?php
    if (isset($_POST['cadastrar'])){
    if(empty($_POST['nome']) ||empty($_POST['email']) || empty($_POST['senha']) || empty($_POST['confirma-senha']) || empty($_POST['senac'])){
	  
      header("location:cadastro.php?campos_obrigatorios");
} else {
	
	} else {
		// Verificação de senha e login
    $senhaDigitada = password_hash($_POST['senha']);
    $confirmaSenha = password_hash($_POST['confirma-senha']);
		if($senhaDigitada === $confirmaSenha){
			header("location:login.php?cadastro_concluido");
		} else {
			header ("location:login.php?dados_incorretos");
		}
	}
}
}


?>


  <div class="modal fade campoModal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Termos de uso</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <ul>
          <li>Não será permitido a utilização do site para fins de vendas de produtos, mesmo de livros. Caso a prática seja identificada,
            a conta será imeditamanete banida.
          </li>
          <hr>
          <li>A LivroSolto preza pela honestidade e respeito, portanto, caso alguma troca ou doação sejam acordados e esse não seja devidamente cumprido,
            nos vemos no direito de suspender a conta pelo prazo de 3 dias úteis.
          </li>
          <hr>
          <li>A LivroSolto condena qualquer prática criminosa de preconceito, racisco, homofobia e assédio. Caso algum desses comportamentos sejam identificados, a LivroSolto
            se encontrará no direito de banir a conta permanentemente e repassar o ocorrido para autoridades.
          </li>
          <hr>
          <li>Não será tolerado contas com identidade fraudulentas. A consequência para tal caso, será o banimento imediato.</li>
          <hr>
          <li>Para todos usuários solicitamos o respeito, a honestidade e compromisso.</li>
        </ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade campoModal" id="exampleModalDois" tabindex="-1" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Política de privacidade</h5>
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
      <ul>
        <li>A livro solto se compromete com a segurança dos dados de seus usuários com padrões rigorosos.</li>
      <hr>
        <li>A livro solto se dispõe no direito de solicitar dados de seus usuários para efetuação do cadastro que será movimentado na utilização do site</li>
      <hr>
        <li>A livro solto se compromete a não utilizar os dados fornecidos pelos usuários, para realizar envios de propagandas, spam, ou ofertas de produtos.</li>
      <hr>
        <li>Todo e qualquer dado fornecido pelo usuário será utilizado apenas com intuito de utilização site e para a identificação do mesmo.</li>
    </ul>
   </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
    </div>
  </div>
</div>
</div>
  

    <script src="bootstrap.bundle.js"></script>
    <script src="nosso.js"></script>
</body>

</html>