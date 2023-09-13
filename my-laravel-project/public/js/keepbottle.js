$(document).ready(function () {
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
    //各キープボトルをクリックする処理
    $(empName).on('click', function(event) {
      var id = $(this).attr("data-id");
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
        url: "/getInfoKeepBottle/{id}",
        data: {"id":id
            },
        success: function (data) {
console.log(data)
          // showInfo(data);
        }
      });
    });

    //キープボトルの情報を表示する
    function showInfo(data){
      console.log(data)
      $("#TxtNameHeader").text(data["customer_name"]+"様の情報");
      $("#customer_name").text(data["customer_name"]);
      $("#customer_name").attr("data-id",data["customer_id"]);
      $("#birthday").text(data["birthday"]);
      $("#company_name").text(data["company_name"]);
      $("#staff_name").text(data["staff_name"]);
    }
    // 編集ボタン
    $("#editBtn").click(function (e) { 
      e.preventDefault();
      var customer_id = $("#customer_name").attr("data-id");
      console.log(customer_id)
      window.location.href = "/editor?id=" + customer_id;
    });
});