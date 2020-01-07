function switchTab(event){
  document.querySelector("ul.nav-tab li.active").classList.remove("active");
  document.querySelector(".tab-pane.active").classList.remove("active");

  let clicked = event.currentTarget;
  let anchor = event.target;
  let activePaneID = anchor.getAttribute("href");

  event.preventDefault();
  clicked.classList.add("active");
  document.querySelector(activePaneID).classList.add("active");
}

window.addEventListener("load", function(){
  let tabs = document.querySelectorAll("ul.nav-tab > li");
  for(i = 0; i < tabs.length; ++i){
    tabs[i].addEventListener("click", switchTab);
  }
});