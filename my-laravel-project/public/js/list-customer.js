$(document).ready(function(){
    const elem = $('.intell');
    const ele = $(".intell-aft");
    const intellmain = $('main');
    const empName =$(".emp-name span");
    var modal =$("#modalBox");
    var btn =$("boxBtn");
    var span =$(".boxBtn")[0];
    var intellClose = $(".intell-close")[0];
    // 表示したリストを消す処理(スマホサイズ)
    $(intellClose).on('click', function(event) {
        $('body').removeClass("intell-aft");
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
          showInfo(data["customerInfo"][0]);
          showMoney(data["slipMgsTotal"][0]);
        }
      });
    });

    //顧客の情報を表示する
    function showInfo(data){
      $("#TxtNameHeader").text(data["customer_name"]+"様の情報");
      $("#customer_name").text(data["customer_name"]);
      $("#customer_name").attr("data-id",data["customer_id"]);
      $("#birthday").text(data["birthday"]);
      $("#company_name").text(data["company_name"]);
      $("#staff_name").text(data["staff_name"]);
    }

    //顧客の総合金額を表示する
    function showMoney(data){
      $("#this_month_money").text(data["total_this_month"]);
      $("#that_month_money").text(data["total_last_month"]);
    }

    var flagSearch=0;
    //検索機能
    $('#search').keyup(function (e) { 
      let keySearch=$(this).val();
      let staffList = $(".emp-name ul li");
      staffList.show();
      for (let i = 0; i < staffList.length; i++) {
        if (staffList[i].textContent.indexOf(keySearch) == -1) {
          $(staffList).eq(i).hide();
        }
      }
    });
    
    // 編集ボタン
    $("#editBtn").click(function (e) { 
      e.preventDefault();
      var customer_id = $("#customer_name").attr("data-id");
      if(!isNaN(customer_id)){
        window.location.href = "/customer-editor?id=" + customer_id;
      }else{
        alert("顧客を選択してください。");
      }
    });
  });