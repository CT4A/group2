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
        var id = Number($(this).attr("data-id"));
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
            url: "/GetInfoBottle/{id}",
            data: {"id":id
            },
            success: function (data) {
            showInfo(data[0]);
            }
        });
    });
      //ボトルの情報を表示する
    function showInfo(data){
        $("#TxtNameHeader").text(data["liquor_name"]+"の情報");
        $("#liquor_id").text(data["liquor_id"]);
        $("#liquor_name").text(data["liquor_name"]);
        $("#liquor_type").text(data["liquor_type"]);
        $("#liquor_number").text(data["liquor_number"]);
        
    }
      // 編集ボタン
    $("#editBtn").click(function (e) { 
        e.preventDefault();
        let liquor_id = $("#liquor_id").text();
        window.location.href = "/bottle-editor?liquor_id=" + liquor_id;
    });
});