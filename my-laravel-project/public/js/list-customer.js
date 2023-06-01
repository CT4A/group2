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
      //console.log("clicked empName span");
      //console.log("id = "+ id);
      if($(event.target).closest("span").length) {
        //console.log("add intell-aft");
        $('body').addClass("intell-aft");
      }
      
      $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
        }
    });
      $.ajax({
        type: "post",
        url: "/getInfoCustomer/{id}",
        data: {"id":id
            },
        success: function (data) {
          // console.log("success");
          showInfo(data[0]);
        }
      });
    });

    function showInfo(data){
      $("#TxtNameHeader").text(data["customer_name"]+"様の情報");
      $("#customer_name").text(data["customer_name"]);
      $("#birthday").text(data["birthday"]);
      $("#company_name").text(data["company_name"]);
      $("#staff_name").text(data["staff_name"]);
        console.log(data['staff_name']);
    }
  });