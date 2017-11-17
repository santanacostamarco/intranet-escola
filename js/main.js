function clearCurrentTab(){
  var currentTab = document.querySelectorAll(".current");
  if ($(currentTab).hasClass("current")){
    $(currentTab).toggleClass("current");
  }
}
function addCurrentTab(current){
  current.classList.add("current");
}
