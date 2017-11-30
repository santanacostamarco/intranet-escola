$('.nav-ajustes li a').click(function(event){
  event.preventDefault();
  var link = this.getAttribute('href');
  var currentButton = this.parentNode;
  $('.replace-ajustes').load('front/'+link, function(){
    clearCurrentTab();
    addCurrentTab(currentButton);
  });
});
