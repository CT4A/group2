$(document).ready(function(){
//    var dateInput = document.getElementById('SelDate');
//   // Lấy giá trị ngày mặc định
//   var defaultValue = dateInput.value;

//   // Chuyển đổi giá trị từ yyyy/mm/dd thành mm/dd/yyyy
//   var parts = defaultValue.split('-');
//   var mmddyyyyValue = parts[1] + '/' + parts[2] + '/' + parts[0];

//   // Gán giá trị đã chuyển đổi vào trường nhập liệu ngày
//   dateInput.value = mmddyyyyValue;
    $('button[id="delbtn"]').click(function(){
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
});