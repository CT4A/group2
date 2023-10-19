$(document).ready(function(){


    $("li").click(function(){
        window.valueToPass= $(this).attr("id");
        localStorage.setItem("myValue",valueToPass);
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
    function AttendInfo(data) {
        
    }
});