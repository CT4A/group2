$(document).ready(function(){
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
        // 表示したリストを消す処理(スマホサイズ)
        $(intellClose).on('click', function(event) {
          $('body').removeClass("intell-aft");
      });
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
    function showInfo(data){
      $("#TxtNameHeader").text(data["staff_name"]+"の情報");
      $("#staff_id").text(data["staff_id"]);
      $("#staff_name").text(data["staff_name"]);
      $("#tel").text(data["tel"]);
      $("#residence").text(data["residence"]);
      $("#birthday").text(data["birthday"]);
      $("#remarks").text(data["remarks"]);
    }
    // 編集ボタン
    $("#editBtn").click(function (e) { 
      e.preventDefault();
      var staff_id = $("#staff_id").text();
      if(!isNaN(staff_id)){
        window.location.href = "/emp-editor?id=" + staff_id;
      }else{
        alert("スタッフを選択してください。");
      }
    });
    $(".money").each(function(){
      moneytxt = $(this).text();
      $(this).text(moneytxt.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")+"円");
    })
});