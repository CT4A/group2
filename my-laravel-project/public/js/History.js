$(document).ready(function(){
    var HistoryInfo = $(".history_info")
    $(HistoryInfo).click(function(){
        $(HistoryInfo).removeClass("history_info_aft");
        $(this).addClass("history_info_aft");
    });
    $('button[class="delbtn"]').click(function(){
        let history_infoEle = $(this).closest(".history_info");
        let timeELe = history_infoEle.find("time")[0];
        let time = timeELe.textContent;
        let staff_id = $('#staff_name').attr("data-id");

        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "post",
            url: "/removeHistory/{id}",
            data: {"time":time,
                    "staff_id":staff_id,
            },
            success: function (data) {
                alert(time+"を削除しました");
                location.reload();
            }
        });
    })
    $('button[class="Addbtn"]').click(function(){
        let history_infoEle = $(this).closest(".history_info");
        let timeELe = history_infoEle.find("time")[0];
        let time = timeELe.textContent;
        let staff_id = $('#staff_name').attr("data-id");
        console.log(time)
        console.log(staff_id)
        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "post",
            url: "/additionHistory/{id}",
            data: {"time":time,
                    "staff_id":staff_id,
            },
            success: function (data) {
                alert(time+"を付加しました。");
                location.reload();
            }
        });
    })
});