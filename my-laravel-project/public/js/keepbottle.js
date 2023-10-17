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
  filBtn =$("#filter-btn");
  filArea =$(".filter-area");
  filterClose=$(".filter-close");

  $(intellClose).on('click', function(event) {
      $('body').removeClass("intell-aft");
  });
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
      let liquor_id= $(this).attr("data-liquorid");
      let liquor_number = $(this).attr("data-liquornumber");
      let customer_id = $(this).attr("data-customerid");
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
          showInfo(data);
        }
      });
    });

    //キープボトルの情報を表示する
    function showInfo(data){
      $("#TxtNameHeader").text(data["liquor_type"]+"の情報");
      $("#liquor_id").text(data["liquor_id"]);
      $("#liquor_id").attr("data-id", data["liquor_id"]);
      $("#customer_name").text(data["customer_name"]);
      $("#customer_name").attr("data-id", data["customer_id"]);

      $("#liquor_name").text(data["liquor_name"]);
      $("#liquor_type").text(data["liquor_type"]);
      $("#liquor_type").attr("data-id", data["liquor_number"]);

      $("#date").text(data["liquor_day"]);
      
      if(data["remarks"]){
      $("remarks").text(data["remarks"]);
      }else{
        $("remarks").text("なし");
      }
    }
    // 編集ボタン
    $("#editBtn").click(function (e) { 
      e.preventDefault();
      let customer_id = $("#customer_name").attr("data-id");
      let liquor_id = $("#liquor_id").attr("data-id");
      let liquor_number = $("#liquor_type").attr("data-id");
      let url="/keepBottleEditor?customer_id=" + customer_id+"&"+"liquor_id=" + liquor_id+"&"+"liquor_number="+liquor_number
      window.location.href = url;
    });
});