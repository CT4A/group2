$(document).ready(function(){
    const elem = $('.intell');
    const ele = $(".intell-aft");
    const intellmain = $('main');
    const empName =$(".emp-name span");
    var modal = document.getElementById("modalBox");
    var btn = document.getElementById("boxBtn");
    var intellButton = $(".intell-button");
    var span = document.getElementsByClassName("close")[0];
    $(intellmain).on('click', function(event) {
      if ($(event.target).closest(intellButton).length) {
        $('body').removeClass("intell-aft");
      }
    });
    $(empName).on('click', function(event) {
      event.stopPropagation();
      console.log("clicked empName span");
      if($(event.target).closest("span").length || $(event.target).closest("intell").length) {
        console.log("add intell-aft");
        $('body').addClass("intell-aft");
      }
    });
    $(intellButton)
  });
btn.onclick = function () {
  modal.style.display = "block";
};
span.onclick = function () {
  modal.style.display = "none";
};

window.onclick = function (event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
};