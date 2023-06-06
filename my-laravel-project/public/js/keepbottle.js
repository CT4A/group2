$(document).ready(function () {
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
});