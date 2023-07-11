$(document).ready(function(){
    const elem = $('.intell');
    const ele = $(".intell-aft");
    const intellmain = $('main');
    const empName =$(".emp-name span");
    const empNamePay =$(".emp-name li");
    var modal = $("#modalBox");
    var btn = $("#boxBtn");
    var span = $(".close")[0];
    filBtn =$("#filter-btn");
    filArea =$(".filter-area");
    filterClose=$(".filter-close");
    $(intellmain).on('click', function(event) {
      if ($(event.target).closest('.intell').length == 0) {
        $('body').removeClass("intell-aft");
      }
    });
    // バツボタンがクリックされたときの処理
    $(elem).click(function(e){
      var target = $(e.target);
      var beforeContent = window.getComputedStyle(target[0], '::before').getPropertyValue('content');
      if (beforeContent !== "" && beforeContent !== "none") {
        $('body').removeClass("intell-aft");
      }
    })
    $(filBtn).click(function(){
      console.log("test");
      $(filArea).addClass("filter-area-aft");
    });
    $(filterClose).click(function(){
      $(filArea).removeClass("filter-area-aft")
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
    $("#billSearch").keyup(function(e){
      let BillSearch = $(this).val();
      let BillCustomername = $(".bill-list-items ul .customer_name");
      let BillStaffname = $(".bill-list-items ul .staff_name");
      BillCustomername.parent().show();
      for (let i = 0 ; i < BillCustomername.length; i++){
        if($(BillCustomername[i]).text().indexOf(BillSearch) == -1){
          if($(BillStaffname[i]).text().indexOf(BillSearch) == -1 ){
          $(BillCustomername).parent().eq(i).hide();
        }
        }
      }
    })
    //検索機能
    $('#search').keyup(function (e) { 
      let keySearch=$(this).val();
      let staffList = $(".emp-name ul li span");
      staffList.show();
      for (let i = 0; i < staffList.length; i++) {
        if (staffList[i].textContent.indexOf(keySearch) == -1) {
          $(".emp-name ul li span").eq(i).hide();
        }
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