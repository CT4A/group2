$(document).ready(function () {
<<<<<<< HEAD
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
=======
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
>>>>>>> 7eaaae2e491d6968acf70e02438885b1d5b0d15d
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
<<<<<<< HEAD
      let liquor_id = $(this).attr("data-liquorId");
      let liquor_number = $(this).attr("data-liquorNumber");
      let customer_id = $(this).attr("data-customerId");
=======
      var id = $(this).attr("data-id");
      console.log("test");
>>>>>>> 7eaaae2e491d6968acf70e02438885b1d5b0d15d
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
<<<<<<< HEAD
          console.log(data)
          showInfo(data);
=======
          showInfo(data[0]);
>>>>>>> 7eaaae2e491d6968acf70e02438885b1d5b0d15d
        }
      });
    });

    //キープボトルの情報を表示する
    function showInfo(data){
<<<<<<< HEAD
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
=======
      console.log(data)
      $("#TxtNameHeader").text(data["liquor_name"]+"の情報");
      $("#liquor_id").text(data["liquor_id"]);
      $("#customer_name").text(data["customer_name"]);
      $("#liquor_name").text(data["liquor_name"]);
      $("#liquor_type").text(data["liquor_type"]);
      $("#date").text(data["liquor_day"]);
      if(data["remarks"]){
      $("remarks").text(data["remarks"]);
      }else{
        $("remarks").text("なし");
      }
>>>>>>> 7eaaae2e491d6968acf70e02438885b1d5b0d15d
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