$(document).ready(function(){
const chkbox = $("#checkbox");
const inptxt = $("input[type='text']");
const plus = $(".plus");
const kindList = $(".kind-list");
const kinds = $(".kinds");
const kindsli = $(".kinds li");
var plusCnt =1;
$(chkbox).click(function () {
    //console.log("test");
    if ($("#checkbox").prop("checked") == true) {
        $('ol').removeClass("close").addClass("open");
    } else {
        $('ol').removeClass("open").addClass("close");
    };
});
$(kindsli).click(function () {
    console.log("click");
    kindsli.removeClass("kind-Click");
    $(this).addClass("kind-Click")
    if($(this).text() == "その他" && !$(kinds).hasClass("kinds-aft")){
        console.log($(this).text());
        // $(kinds).addClass("kinds-aft");
        var input = $('<input type="text" />');
        $(kinds).append(input);
    }else{
    // $(kinds).removeClass("kinds-aft");
    $(kinds+'input:last-child').remove();
    console.log($(this).text());
    }
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