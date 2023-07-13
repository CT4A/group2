$(document).ready(function(){
    const elem = $('.intell');
    const ele = $(".intell-aft");
    const intellmain = $('main');
    const empName =$(".emp-name span");
    var modal =$("#modalBox");
    var btn =$("boxBtn");
    var span =$(".boxBtn")[0];
    // 表示したリストを消す処理(スマホサイズ)
    $(intellmain).on('click', function(event) {
      if ($(event.target).closest('.intell').length == 0) {
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
      console.log(e.key);
      console.log("tesa");
      let keySearch=$(this).val();
      console.log(keySearch);
      let staffList = $(".emp-name ul li span");
      staffList.fadeIn();
      for (let i = 0; i < staffList.length; i++) {
        if (staffList[i].textContent.indexOf(keySearch) == -1) {
          $(".emp-name ul li span").eq(i).fadeOut();
        }
      }
    });
  });