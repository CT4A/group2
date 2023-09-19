$(document).ready(function(){
    const elem = $('.intell');
    const ele = $(".intell-aft");
    const intellmain = $('main');
    const empName =$(".emp-name span");
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
    //給料明細を取得する
    $(empName).on('click', function(event) {
      event.stopPropagation();
      var id =$(this).data('id');
      $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
        }
    });
      $.ajax({
        type: "post",
        url: "/getPayStaff/{id}",
        data: {"id":id
            },
        success: function (data) {
            console.log(data);
        }
      });
    });
    var flagSearch=0;
    $("#billSearch").keyup(function(e){
      let BillSearch = $(this).val();
      let BillCustomername = $(".bill-list-items ul .customer_name");
      let BillStaffname = $(".bill-list-items ul .staff_name");
      BillCustomername.parent().show();
      console.log(BillCustomername.length)
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
    
    var currentDate = $("#currentDate").text();
    var dateObject = new Date(currentDate);

    //nextbtnの処理
    $(".btn-next").click(function (e) { 
      e.preventDefault();
      let currentDate = $("#currentDate").text();
      let dateObject = new Date(currentDate);
      //次の月をまとめる。string型
      console.log(dateObject)
      if(dateObject.getMonth() <= 10){
      currentDate = dateObject.getFullYear()+"-"+(dateObject.getMonth() + 2).toString().padStart(2, '0');
      $("#currentDate").text(currentDate);
      }
    });
    //previousbtnの処理
    $(".btn-previous").click(function (e) { 
      e.preventDefault();
      let currentDate = $("#currentDate").text();
      let dateObject = new Date(currentDate);
      //次の月をまとめる。string型
      if(dateObject.getMonth() >= 1){
      currentDate = dateObject.getFullYear()+"-"+dateObject.getMonth().toString().padStart(2, '0');
      $("#currentDate").text(currentDate);
      }
    });
});