
  <style type="text/css"> 
      .inputs{
        background-color: transparent;
        border: 2px solid #00d2ff;
        color: #fff;
      }
      .inputs::placeholder{
        color:dodgerblue;
      }
      .inputs:focus{
        background-color: transparent;
      }
      #modal-mensagem{
        width:100% !important;
        border-radius: 10px;
      }
      
  </style>

</head>
<div class="modal fade" id="modal-mensagem">
    <div class="modal-dialog" >
        <div class="modal-content">
            <div class="modal-header" style="background:linear-gradient(to right, #00d2ff,#3a7bd5);">
                 <h4 class="modal-title text-white"><img src="images/logo/logo.png">
                    Login
                 </h4>
                 <button type="button" class="close" data-dismiss="modal"><span><i class="fas fa-times-circle text-white"></i></span></button>
             </div>
            <div class="modal-body"> 
                 <form>
                  <div class="form-group">
                    <center><label for="exampleInputtext1" class=" lbls"><img src="images/icon/teamwork.png"></label></center>
                    <input  class="form-control inputs text-primary" id="inputs" aria-describedby="emailHelp" placeholder="Email">
                   
                  </div>
                  <div class="form-group">
                     <center><label for="exampleInputPassword1" class=" lbls"></center>
                    <input type="password" class="form-control inputs text-primary" id="inputs" placeholder="Senha">
                  </div>
                  
                  <button type="submit" class=" btn btn-block btn-outline-primary text-primary">Entrar</button>
                </form>
             </div>
            <div class="modal-footer" style="background:linear-gradient(to right, #00d2ff,#3a7bd5);">
                 <i class="fas fa-user-plus text-white"></i> <a href="#" class="text-white">Cadastre-se</a> |
                <i class="fas fa-question-circle text-white" ></i> <a href="#" class="text-white">Esqueceu a senha?</a>
            </div>
         </div>
     </div>
 </div>