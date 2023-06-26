$(document).ready(function(){
    const Birthday = $(".Birthday");
    const newsRadio =$(".news-radio input");
    const newspageinfo=$(".newspage-info");
    $(newsRadio).click(function(){
      var RadioValue = $(this).attr("id");
      $(newspageinfo.parent().parent()).hide();
      $(newspageinfo).filter(function(){
        console.log("filtertest")
        console.log(RadioValue)
        if($(this).hasClass(RadioValue)){
          $(this).parent().parent().show();
        }else if(RadioValue ==="ALL-radio"){
          $(newspageinfo.parent().parent()).show();
        }
      })
    })
});