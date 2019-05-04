<?php 
include 'header.php';

?>
<!-- nav part end -->
<style type="text/css">
  .lbls{
    font-size: 1em;
    font-weight: bold;
    color: #3a7bd5;
    float: left;
  }
</style>
<section class="page-title page-title-overlay " data-background="images/background/about.jpg">
  <div class="container">
    <div class="row">
      <div class="col-lg-7">
        <h1 class="text-white position-relative">Professor<span class="watermark-sm">Professor</span></h1>
        <p class="text-white pt-4 pb-4">Ajude no aprendizado dos seus alunos!</p>
      </div>
      <div class="col-lg-3 ml-auto align-self-end">
        <nav class="position-relative zindex-1" aria-label="breadcrumb">
          <ol class="breadcrumb justify-content-end bg-transparent">
            <li class="breadcrumb-item"><a href="index.html" class="text-white">Home</a></li>
            <li class="breadcrumb-item text-white" aria-current="page">Cadastro de professor</li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
</section>


<br><br>
<section class="section section-lg-bottom bg-light">
  <div class="container">
    <div class="row">
      <div class="col-lg-10 text-center">
        <p class="subtitle">Cadastre-se</p>
        <h2 class="section-title">Cadastre-se Para Desfrutar do Nosso Sistema.</h2>
      </div>
      <div class="col-lg-6 text-center p-0">
          <form class="row" method="post" action="cadastra_professor.php">
          <div class="col-lg-12">
           <label for="exampleInputtext1" class=" lbls ">Seu nome:</label>

           <input type="text" class="form-control mb-4 inputs" placeholder="Ex: José da Silva" name="nome">
         </div>
         <div class="col-lg-12">
           <label for="exampleInputtext1" class=" lbls">Seu Email:</label>
           <input type="text" class="form-control mb-4 inputs" placeholder="Ex: jose@gmail.com" name="email">

           <input type="text" class="form-control mb-4 inputs text-primary" placeholder="Ex: José da Silva">
         </div>
         <div class="col-lg-12">
           <label for="exampleInputtext1" class=" lbls">Seu Email:</label>
          <input type="text" class="form-control mb-4 inputs text-primary" placeholder="Ex: jose@gmail.com">

        </div>
        <div class="col-lg-6">
          <label for="exampleInputtext1" class=" lbls">Data de Nascimento:</label>
          <input type="date" class="form-control mb-4 inputs"  placeholder="Data Nasc." style="color: #3a7bd5" name="nascimento">
        </div>
        <div class="col-lg-6">
          <label for="exampleInputtext1" class=" lbls">Nível de Escolaridade:</label>
          <select class="form-control mb-4 inputs" required="" style="height: 60px; color: #3a7bd5" name="escolaridade">
            <option value="">Selecione..</option>
            <option>Ensino Fundamental Completo</option>
            <option>Ensino Fundamental Incompleto</option>
            <option>Ensino Médio Completo</option>
            <option>Ensino Médio Incompleto</option>
            <option>Ensino Superior Incompleto</option>
            <option>Ensino Superior Completo</option>



          </select>
        </div>
         <div class="col-lg-12">
          <label for="exampleInputtext1" class=" lbls">CPF:</label>

          <input type="text" class="form-control mb-4 inputs"  placeholder="CPF" style="color: #3a7bd5" name="cpf">

          <input type="text" class="form-control mb-4 inputs cpf"  placeholder="CPF" style="color: #3a7bd5">

        </div>
        <div class="col-lg-12">
           <label for="exampleInputtext1" class=" lbls">Senha de acesso:</label>
           <input type="password" class="form-control mb-4 inputs" placeholder="Dica: Use senhas fortes" name="senha">
        </div>
        <div class="col-12">
          <button type="submit" class="btn btn-outline-primary">Cadastrar-se</button>
          <br><br>
        </div>
      </form>
    </div>
    <div class="col-lg-6 text-center p-0">
      <img src="images/banner/banner-2.png" width="350px" height="350px">
    </div>
  </div>
</div>
</section>

<!-- subscription -->

<!-- subscription -->

<!-- footer part start -->
<?php 
include 'footer.php';
?>
