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
        <h1 class="text-white position-relative">Cadastre-se<span class="watermark-sm">Cadastre-se</span></h1>
        <p class="text-white pt-4 pb-4">Você aluno, cadastre-se para ter acesso à plataforma.</p>
      </div>
      <div class="col-lg-3 ml-auto align-self-end">
        <nav class="position-relative zindex-1" aria-label="breadcrumb">
          <ol class="breadcrumb justify-content-end bg-transparent">
            <li class="breadcrumb-item"><a href="index.php" class="text-white">Home</a></li>
            <li class="breadcrumb-item text-white" aria-current="page">Cadastro</li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
</section>



<section class="section section-lg-bottom bg-light" style="padding-top: 5%;">
  <div class="container">
    <div class="row">
      <div class="col-lg-10 text-center">
        <p class="subtitle">Cadastre-se</p>
        <h2 class="section-title">Cadastre-se Para Desfrutar do Nosso Sistema.</h2>
      </div>
      <div class="col-lg-6 text-center p-0">
        <form action="valida_cadastro/cadastra_aluno.php" method="POST" class="row">
          <div class="col-lg-12">
           <label for="exampleInputtext1" class=" lbls ">Seu nome:</label>
           <input type="text" name="nome" required="" class="form-control mb-4 inputs text-primary" placeholder="Ex: José da Silva">
         </div>
         <div class="col-lg-12">
           <label for="exampleInputtext1" class=" lbls">Seu Email:</label>
          <input type="text" name="email" required="" class="form-control mb-4 inputs text-primary" placeholder="Ex: jose@gmail.com">
        </div>
        <div class="col-lg-6">
          <label for="exampleInputtext1" class=" lbls">Data de Nascimento:</label>
          <input type="date" name="nascimento" required="" class="form-control mb-4 inputs"  placeholder="Data Nasc." style="color: #3a7bd5">
        </div>
        <div class="col-lg-6">
          <label for="exampleInputtext1" class=" lbls">Nível de Escolaridade:</label>
          <select class="form-control mb-4 inputs" name="escolaridade" required="" style="height: 60px; color: #3a7bd5">
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
           <label for="exampleInputtext1"  required="" class=" lbls">Senha de acesso:</label>
          <input type="password" name="senha" class="form-control mb-4 inputs text-primary" placeholder="Dica: Use senhas fortes">
        </div>
        <div class="col-12">
          <button type="submit" class="btn btn-outline-primary">Cadastrar-se</button>
          <br><br>
        </div>
      </form>
    </div>
    <div class="col-lg-6 text-center p-0">
      <img src="images/banner/banner-1.png" width="350px" height="350px">
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
