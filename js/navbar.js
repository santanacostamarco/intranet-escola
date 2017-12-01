var botoesNavBar = document.querySelectorAll(".nav-bar .button");
for (var i = 0; i < botoesNavBar.length; i++){
  botoesNavBar[i].addEventListener("click", function(event){
    event.preventDefault();
    var link = this.parentNode.getAttribute("href");
    var currentButton = this;
    var lista = currentButton.parentNode.parentNode.parentNode;
    if (link == "home.php"){
      window.location.reload("/home.php");
    } else {
      $(".section-replace").load("front/"+link, function(){
        console.log(lista);
        clearCurrentTab(lista);
        addCurrentTab(currentButton);
      });
    }
  });
}
