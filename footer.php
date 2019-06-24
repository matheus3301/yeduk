<footer class="bg-secondary pt-5">
  <section class="section border-bottom border-color">
    <div class="container">
      <div class="row justify-content-between">
        <div class="col-md-5 mb-4 mb-md-0">
          <img src="images/logo/logo.png" class="mb-4" alt="agico">
          <p class="text-light mb-4">O Yeduk é um projeto desenvolvido na disciplina Laboratório Web do Curso de Informática na Escola Estadual de Ensino Profissional Walter Ramos de Araújo no Ano de 2019.</p>
          
        </div>
        <div class="col-md-3 col-sm-6">
          <h4 class="text-white mb-4">Serviços</h4>
          <ul class="list-styled list-hover-underline">
            <li class="mb-3 text-light"><a href="index.php" class="text-light">Início</a></li>
            <li class="mb-3 text-light"><a href="cadastro.php" class="text-light">Cadastre-se</a></li>
            <li class="mb-3 text-light"><a href="#" class="text-light" data-toggle="modal" data-target="#modal-mensagem">Login</a></li>
            <li class="mb-3 text-light"><a href="team.php" class="text-light">Sobre Nós</a></li>
             <li class="mb-3 text-light"><a data-toggle="modal" data-target="#modal-login-professor" class="text-light">Sou professor</a></li>
                        
          </ul>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6">
          <h4 class="text-white mb-4">Desenvolvimento</h4>
          <img src="images/logo.png" width="100%">
        </div>
      </div>
    </div>
  </section>

  <!-- footer part end -->

  <!-- copyright part start -->
  <section class="py-4">

    <div class="container">
      <div class="row">
        <div class="col-md-6 text-center text-md-left mb-3 mb-md-0">
          <p class="mb-0 text-light">ROCHA'S DEV &copy;</p>
            <script>
              var CurrentYear = new Date().getFullYear()
              document.write(CurrentYear)
            </script>
            Todos os Direitos Reservados</p>
        </div>
        <div class="col-md-6 text-md-right text-center">
          <ul class="list-inline">
            <li><a href="restrito/loginrestrito.php" class="text-light">Restrito</a></li>
          </ul>
        </div>
      </div>
    </div>
  </section>
  <!-- copyright part end -->
</footer>

<!-- jQuery -->
<script src="js/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
<!-- Bootstrap JS -->
<script src="js/bootstrap.min.js"></script>
<!-- slick -->
<script src="js/slick.min.js"></script>
<!-- venobox -->
<script src="js/venobox.min.js"></script>
<!-- google map -->

<script src="js/gmap.js"></script>
<!-- Main Script -->
<script src="js/script.js"></script>

<script type="text/javascript">
  $(document).ready(function(){
    $('.cpf').mask('000.000.000-00');
});
</script>
<!-- Modais -->


</body>

</html>