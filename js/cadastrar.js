var tipoUsuario = document.querySelector("#user-tipo");
tipoUsuario.addEventListener("change", function(){
  switch (tipoUsuario.value) {
    case "0":
      $(".form-cadastrar").html('<div class="system-info error"> <p> Escolha uma opção </p> </div>');
      break;
    case "1":
      $(".form-cadastrar").load("front/form_cadastrar_admin.php");
      break;
    case "2":
      $(".form-cadastrar").load("front/form_cadastrar_professor.php");
      break;
    case "3":
      $(".form-cadastrar").load("front/form_cadastrar_aluno.php");
      break;

  }
});
