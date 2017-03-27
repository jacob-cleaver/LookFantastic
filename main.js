var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].onclick = function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight){
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    }
  }
}

$(".toggle").click(function(){
  $(".navcollaps").toggleClass("show");
});

document.getElementsByClassName('toggle').click(fucntion(){
  document.getElementsByClassName('navcollaps').toggleClass("show");
});
