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
        if ($("#checkbox").prop("checked") == true) {
            $('ol').removeClass("close").addClass("open");
        } else {
            $('ol').removeClass("open").addClass("close");
        };
    });
    
    
    $(kindsSelecter).click(function(){
        $(kindList).removeClass("kind-list-aft");
        if(!$(this).hasClass("kinds-selecter-aft")){
            $(kindsSelecter).removeClass("kinds-selecter-aft");
            $(this).addClass("kinds-selecter-aft");
            $(this).find(kindList).addClass("kind-list-aft");
        }else{
            $(this).removeClass("kinds-selecter-aft");
            $(this).find(kindList).removeClass("kind-list-aft");
        
        }
    });


    $(kindsli).click(function () {
        var test = $(this).parent();
        var ListPush = test.parent().parent();
        test.find(kindsInp).addClass("kind-Click");
        if($(this).text() == "その他"){
            $(kinds).addClass("kinds-aft");
            console.log(test.find(kindsInp))
            test.find(kindsInp).val("");
            console.log("その他");
        }else{
            ListPush.addClass("kinds-aft");
            ListPush.find(kindsInp).val($(this).text());
        }
        test.find(kindList).removeClass("kind-list-aft");
        test.find(kindsSelecter).removeClass("kinds-selecter-aft");
    });
    
    
        $(inptxt).click(function(event) {
            var test =$(inptxt).eq(event).parent();
        });
    });
    