$(document).ready(function(){
    const elem = $('.intell');
    const ele = $(".intell-aft");
    const intellmain = $('main');
    const empName =$(".emp-name span");
    var modal = $("#modalBox");
    var btn = $("#boxBtn");
    var span = $(".close")[0];
    filBtn =$(".filter-btn");
    $(intellmain).on('click', function(event) {
      if ($(event.target).closest('.intell').length == 0) {
        $('body').removeClass("intell-aft");
      }
    });
    $(filBtn).click(function(){
      console.log("test");
      
    });
    
    //スタッフのリストの名前をクリックの処理
    $(empName).on('click', function(event) {
      event.stopPropagation();
      var id = $(this).attr("id");
      if($(event.target).closest("span").length) {
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
          showInfo(data[0]);
        }
      });
    });
    var flagSearch=0;
    //検索機能
    $('#search').keyup(function (e) { 
      let keySearch=$(this).val();
      let staffList = $(".emp-name ul li span");
      staffList.fadeIn();
      for (let i = 0; i < staffList.length; i++) {
        if (staffList[i].textContent.indexOf(keySearch) == -1) {
          $(".emp-name ul li span").eq(i).fadeOut();
        }
        
        
        // let listPositonTop =  $(".emp-name ul").offset().top;
        // let idPositionTop = $('#'+id).offset().top;
        // $(".emp-name ul").scroll(listPositonTop-idPositionTop);
      }
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