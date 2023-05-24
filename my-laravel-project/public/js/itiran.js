$(document).ready(function(){
    const elem = $('.intell');
    const ele = $(".intell-aft");
    const intellmain = $('main');
    const empName =$(".emp-name span");
    var modal = document.getElementById("modalBox");
    var btn = document.getElementById("boxBtn");
    var span = document.getElementsByClassName("close")[0];
    $(intellmain).on('click', function(event) {
      if ($(event.target).closest('.intell').length == 0) 
      {
        $('body').removeClass("intell-aft");
      }
    });
    $(empName).on('click', function(event) {
      event.stopPropagation();
      console.log("clicked empName span");
      if($(event.target).closest("span").length) {
        console.log("add intell-aft");
        $('body').addClass("intell-aft");
      }
    });
  });
// btn.onclick = function () {
//   modal.style.display = "block";
// };
// span.onclick = function () {
//   modal.style.display = "none";
// };

// window.onclick = function (event) {
//   if (event.target == modal) {
//     modal.style.display = "none";
//   }
// };