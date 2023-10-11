$(document).ready(function () {
    const elem = $('.intell');
    const ele = $(".intell-aft");
    const intellmain = $('main');
    const empName =$(".emp-name span");
    const empNamePay =$(".emp-name li");
    var modal = $("#modalBox");
    var btn = $("#boxBtn");
    var span = $(".close")[0];
    var intellClose = $(".intell-close")[0];
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
      let liquor_id = $(this).attr("data-liquorId");
      let liquor_number = $(this).attr("data-liquorNumber");
      let customer_id = $(this).attr("data-customerId");
      if($(event.target).closest("span").length) {
        $('body').addClass("intell-aft");
      }
      $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
        }
      });
      let data = {
        "liquor_id":liquor_id,
        "liquor_number":liquor_number,
        "customer_id":customer_id
      };
      $.ajax({
        type: "post",
        url: "/getInfoKeepBottle",
        data: data,
        success: function (data) {
          console.log(data)
          showInfo(data);
        }
      });
    });

    //キープボトルの情報を表示する
    function showInfo(data){
      $("#TxtNameHeader").text(data["liquor_number"]+" "+data["liquor_type"]+"の情報");
      $("#liquor_number").text(data["liquor_number"]);

      $("#liquor_number").attr("data-liquorId",data["liquor_id"]);
      $("#liquor_number").attr("data-liquorNumber",data["liquor_number"]);

      $("#customer_name").text(data["customer_name"]);
      $("#customer_name").attr("data-id",data["customer_id"]);
      $("#liquor_name").text(data["liquor_name"]);
      $("#liquor_type").text(data["liquor_type"]);
      $("#liquor_day").text(data["liquor_day"]);
      $("#remarks").text(data["remarks"]);
    }
    // 編集ボタン
    $("#editBtn").click(function (e) { 
      e.preventDefault();
      let customer_id = $("#customer_name").attr("data-id");
      let liquor_id = $("#liquor_number").attr("data-liquorId");
      let liquor_number = $("#liquor_number").attr("data-liquorNumber");
      window.location.href = "/keepBottleEditor?customer_id=" + customer_id+"&&"+"liquor_id=" + liquor_id+"&&"+"liquor_number="+liquor_number;
    });
});