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
        url: "/getInfoCustomer/{id}",
        data: {"id":id
            },
        success: function (data) {
          showInfo(data[0]);
        }
      });
    });

    //顧客の情報を表示する
    function showInfo(data){
      $("#TxtNameHeader").text(data["customer_name"]+"様の情報");
      $("#customer_name").text(data["customer_name"]);
      $("#birthday").text(data["birthday"]);
      $("#company_name").text(data["company_name"]);
      $("#staff_name").text(data["staff_name"]);
    }

    var flagSearch=0;
    //検索機能
    $('#search').keyup(function (e) { 
      let keySearch=$(this).val();
      let staffList = $(".emp-name ul li span");
      if(flagSearch==1||keySearch==""){
        staffList.fadeIn();
      }
      for (let i = 0; i < staffList.length; i++) {
        if (staffList[i].textContent.indexOf(keySearch) == -1) {
          $(".emp-name ul li span").eq(i).fadeOut();
          flag=1;
        }
        
        
        // let listPositonTop =  $(".emp-name ul").offset().top;
        // let idPositionTop = $('#'+id).offset().top;
        // $(".emp-name ul").scroll(listPositonTop-idPositionTop);
      }
    });
  });