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
    
    //スタッフのリストの名前をクリックの処理
    $(empName).on('click', function(event) {
      event.stopPropagation();
      var id = $(this).attr("id");
      console.log("clicked empName span");
      console.log("id = "+ id);
      if($(event.target).closest("span").length) {
        console.log("add intell-aft");
        $('body').addClass("intell-aft");
      }
      
      $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
        }
    });
      $.ajax({
        type: "post",
        url: "/getInfoStaff/{id}",
        data: {"id":id
            },
        success: function (data) {
          // console.log("success");
          showInfo(data[0]);
        }
      });
    });

    function showInfo(data){
      $("#TxtNameHeader").text(data["staff_name"]+"の情報");
      $("#staff_id").text(data["staff_id"]);
      $("#staff_name").text(data["staff_name"]);
      $("#tel").text(data["tel"]);
      $("#residence").text(data["residence"]);
      $("#birthday").text(data["birthday"]);
      $("#remarks").text(data["remarks"]);

    }
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