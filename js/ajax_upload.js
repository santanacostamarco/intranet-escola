$('.arquivos .upload form').submit(function(event){
  event.preventDefault();

  $.ajax({
    type: "POST",
    url: "upload_file.php",
    data: $('.arquivos .upload form'),
    success: function(data){
      console.log(data);
    }
  });


});
