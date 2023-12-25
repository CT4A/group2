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
      $(filArea).addClass("filter-area-aft");
    });
    $(filterClose).click(function(){
      $(filArea).removeClass("filter-area-aft")
    });
    //給料明細を取得する
    $(empName).on('click', function(event) {
      event.stopPropagation();
      var id =$(this).data('id');
      var currentDate = $("#currentDate").text();
      $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
        }
    });
      $.ajax({
        type: "post",
        url: "/getPayStaff/{id}",
        data: {"id":id,"currentDate":currentDate
            },
        success: function (data) {
          if (data.message === 'fail') {
            console.log('Lỗi: ' + data.message);
            $('#salary').before('<p>今月出勤しませんでした</p>');
          } else {
            let response = data[0];
            $('#TxtNameHeader').text(response.staff_name+"さんの給料明細");
            $('#basic_salary').text(response.basic_salary+"円");
            $('#total_working_days').text(response.total_working_days+"円");
            $('#total_time').text(response.total_time+"円");
            $('#total_money_people').text(response.total_money_people+"円");
            $('#deduction').text(response.deduction+"円");
            $('#total_branch').text(response.total_branch+"円");
            $('#total_salary').text(response.total+"円");
            
          }
        },
        error:function(data){
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
    
    var currentDate = $("#currentDate").text();
    var dateObject = new Date(currentDate);

    //nextbtnの処理
    $(".btn-next").click(function (e) { 
      e.preventDefault();
      let currentDate = $("#currentDate").text();
      let dateObject = new Date(currentDate);
      //次の月をまとめる。string型
      if(dateObject.getMonth() <= 10){
      currentDate = dateObject.getFullYear()+"-"+(dateObject.getMonth() + 2).toString().padStart(2, '0');
      $("#currentDate").text(currentDate);
      
      window.location.href = '?date='+currentDate;
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
      window.location.href = '?date='+currentDate;
    });
    $(".emp-name ul li span").each(function(){
      console.log(this.textContent)
      var empstr =$(this).text()
      var maxLength = 6;
      if (empstr.length >= maxLength) {
        console.log("test")
        var empstrlim =empstr.substring(6);
        $(this).textContent = empstrlim
    };
    })  
});