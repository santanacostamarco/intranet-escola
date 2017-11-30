$('form.alterar-senha').submit(function(event){
  event.preventDefault();
  $.ajax({
    type: "POST",
    url: "alterar_senha.php",
    data: $('form.alterar-senha').serialize(),
    success: function(data){
      $( '.replace-ajustes').html('<div class="system-info warning"><p>' + data + '</p></div>');
    }
  });
});
