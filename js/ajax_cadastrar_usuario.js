$("#cadastrarUsuario").submit(function(event){
  //$(this).unbind();
  $.ajax({
    type: "POST",
    url: "cadastrar.php",
    data: $("#cadastrarUsuario").serialize(),
    success: function(data){
      alert(data);
    }
  });
  event.preventDefault();
  this.reset();
});
