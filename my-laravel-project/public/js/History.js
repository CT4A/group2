$(document).ready(function(){
    let  HistoryInItem = ".history_info"
    $(HistoryInItem).click(function(){
        $(HistoryInItem).removeClass("history_info_aft");
        $(this).addClass("history_info_aft");
    });
    //編集event
    $('button[name="editbtn"]').click(function(){
        let history_infoEle = $(this).closest(".history_info");
        let timeELe = history_infoEle.find("time")[0];
        let time = timeELe.textContent;
        let staff_id = $('#staff_name').attr("data-id");
        
    });
    //削除event
    $('button[name="delbtn"]').click(function(){
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
                alert("Successfully deleted")
            }
        });
    })
});