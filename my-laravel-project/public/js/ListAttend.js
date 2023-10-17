$(document).ready(function(){

    $("li").click(function(){
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
});