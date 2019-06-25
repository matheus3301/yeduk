<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Login - Restrito</title>

  <!-- Custom fonts for this template-->
  <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link rel="icon" href="../images/icon/logo (2).png">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link href="../css/style.css" rel="stylesheet" type="text/css">

  <style type="text/css">
    
    
    .login{
      height:550px;
    }
    .inpt-log{
      background-color: transparent;
      border:1px solid #00a4db;
      color:#00a4db !important;
    }
    .inpt-log::placeholder{
      color: #00a4db;
    }
    .inpt-log:focus{
      background-color: transparent;
      border:1px solid #00a4db;
    }


  </style>

</head>

<body class="gradiente">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5 login">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block"><img src="../images/background/fundo-login.png" ></div>
              <div class="col-lg-6 conteudo">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-primary">Bem Vindo Administrador!</h1>
                    <img src="../images/icon/manager.png" height="100px" width="100px">
                    <br><br>
                  </div>
                  <form class="user" action="../validaloginadmin.php" method="POST">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user inpt-log" id="exampleInputEmail" name="email" aria-describedby="emailHelp" placeholder="Digite seu E-mail">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user inpt-log" id="exampleInputPassword" placeholder="Password" name="senha">
                    </div>
                   
                    <button type="submit" class="btn btn-primary btn-user btn-block">
                      Login
                    </button><br>
                    <a href="../index.php"><button type="button" class="btn btn-danger btn-user btn-block">
                      Voltar
                    </button></a>
                  </form>
                  <hr>
                  <div class="text-center">
                    
                    <small class="text-success">Developed by Rocha's Dev</small><br>

                    
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
