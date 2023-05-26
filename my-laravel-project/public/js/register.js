$(document).ready(function(){
const chkbox = $("#checkbox");
const inptxt = $("input[type='text']");
const plus = $(".plus");
var plusCnt =1;
$(chkbox).click(function () {
    //console.log("test");
    if ($("#checkbox").prop("checked") == true) {
        $('ol').removeClass("close").addClass("open");
    } else {
        $('ol').removeClass("open").addClass("close");
    };
});
    $(inptxt).click(function(event) {
        //console.log("test");
        var test =$(inptxt).eq(event).parent();
        //console.log(test)
    });
    $(plus).click(function(event) {
        plusCnt+=1;
        $(plus).before('<li><span>出勤者名' + plusCnt + '</span><input type="text" name="time"></li>');
    });
});