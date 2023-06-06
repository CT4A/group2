$(document).ready(function(){
const chkbox = $("#checkbox");
const inptxt = $("input[type='text']");
const plus = $(".plus");
const kindList = $(".kind-list");
const kinds = $(".kinds");
const kindsli = $(".kinds li");
const kindsSelecter = $(".kinds-selecter");
const kindsInp =$(".kinds-inp");
var plusCnt =1;


$(chkbox).click(function () {
    //console.log("test");
    if ($("#checkbox").prop("checked") == true) {
        $('ol').removeClass("close").addClass("open");
    } else {
        $('ol').removeClass("open").addClass("close");
    };
});


$(kindsSelecter).click(function(){
    var test = $(this).parent().addClass(kindList);
    if(!$(this).hasClass("kinds-selecter-aft")){
        test.addClass("kind-list-aft");
        $(this).addClass("kinds-selecter-aft");
    }else{
        test.removeClass("kind-list-aft");
        $(this).removeClass("kinds-selecter-aft");
    }

});


$(kindsli).click(function (e) {
    kindsli.removeClass("kind-Click");
    $(this).addClass("kind-Click");
    if($(this).text() == "その他"){
        $(e > kinds).addClass("kinds-aft");
        kindsInp.val("");
        console.log("その他");
    }else{
    // $(kinds).removeClass("kinds-aft");
    $(kinds).addClass("kinds-aft");
    kindsInp.val($(this).text());
    console.log($(this).text());
    }
    $(kindList).removeClass("kind-list-aft");
    $(kindsSelecter).removeClass("kinds-selecter-aft");
});


    $(inptxt).click(function(event) {
        var test =$(inptxt).eq(event).parent();
    });
    $(plus).click(function(event) {
        plusCnt+=1;
        $(plus).before('<li><span>出勤者名' + plusCnt + '</span><input type="text" name="time"></li>');
    });
});