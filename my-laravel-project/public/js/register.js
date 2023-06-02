$(document).ready(function(){
const chkbox = $("#checkbox");
const inptxt = $("input[type='text']");
const plus = $(".plus");
const kindList = $(".kind-list");
const kinds = $(".kinds");
const kindsli = $(".kinds li");
var plusCnt = 1;
var flag = 1;
$(chkbox).click(function () {
    if ($("#checkbox").prop("checked") == true) {
        $('ol').removeClass("close").addClass("open");
    } else {
        $('ol').removeClass("open").addClass("close");
    };
});

$(kindsli).click(function () {
    if( flag == 0 ){
        flag = 1;
    }
    kindsli.removeClass("kind-Click");
    $(this).addClass("kind-Click")
    if($(this).text() == "その他" && !$(kinds).hasClass("kinds-aft") && flag == 1){
        console.log($(this).text());
        var input = $('<input type="text"/>');
        $(kinds).append(input);
        flag = 0;
    }else{
        $(kinds+'input:last-child').remove();
        console.log($(this).text());
    }
});
    $(inptxt).click(function(event){
        var test =$(inptxt).eq(event).parent();
    });
    $(plus).click(function(event) {
        plusCnt += 1;
        $(plus).before('<li><span>出勤者名' + plusCnt + '</span><input type="text" name="time"></li>');
    });
});