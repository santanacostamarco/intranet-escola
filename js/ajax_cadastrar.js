$(".form-cadastrar form").submit(function(event){
  //$(this).unbind();
  $.ajax({
    type: "POST",
    url: "cadastrar.php",
    data: $(".form-cadastrar form").serialize(),
    success: function(data){
      alert(data);
    }
  });
  event.preventDefault();
});
