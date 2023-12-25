$(document).ready(function(){
    $("li").click(function(){
        window.valueToPass= $(this).attr("id");
        localStorage.setItem("myValue",valueToPass);
    });
    $('#search').keyup(function (e) {
    let keySearch=$(this).val();
    let staffList = $(".emp-name ul a");
    staffList.show();
    for (let i = 0; i < staffList.length; i++) {
      if (staffList[i].textContent.indexOf(keySearch) == -1) {
        $(staffList).eq(i).hide();
      }
    }
  });
  var pageTitle = document.title;
  if(pageTitle =="出勤用社員一覧"){
    console.log(pageTitle)
    document.documentElement.style.setProperty('--none', 'none');
  }
});