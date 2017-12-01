function clearCurrentTab(parent){
  var currentTab = parent.querySelectorAll(".current");
  if ($(currentTab).hasClass("current")){
    $(currentTab).toggleClass("current");
  }
}

function addCurrentTab(current){
  current.classList.add("current");
}
