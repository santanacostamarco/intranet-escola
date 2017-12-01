function clearCurrentTab(parent){
  var currentTab = parent.querySelectorAll(".current");
  if ($(currentTab).hasClass("current")){
    $(currentTab).toggleClass("current");
  }
}

function addCurrentTab(current){
  current.classList.add("current");
}

$('.warning #trocarSenha').click(function(){
  $('.button.ajustes').click();
  setTimeout(function(){
    $(".nav-ajustes #alterarSenha").click();
  },300);

});
