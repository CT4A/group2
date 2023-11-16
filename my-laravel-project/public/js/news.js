$(document).ready(function(){
    const Birthday = $(".Birthday");
    const newsRadio =$(".news-radio input");
    const newspageinfo=$(".newspage-info");
    $(newsRadio).click(function(){
      var RadioValue = $(this).attr("id");
      $(newspageinfo.parent().parent()).show();
      $(newspageinfo).filter(function(){
        if(!$(this).hasClass(RadioValue)){
          $(this).parent().parent().hide();
        }if(RadioValue ==="ALL-radio"){
          $(newspageinfo.parent().parent()).show();
        }
      })
    })

});