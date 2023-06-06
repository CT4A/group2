$(document).ready(function(){
<<<<<<< HEAD
const chkbox = $("#checkbox");
const inptxt = $("input[type='text']");
const plus = $(".plus");
const kindList = $(".kind-list");
const kinds = $(".kinds");
const kindsli = $(".kinds li");
<<<<<<< HEAD
var plusCnt = 1;
var flag = 1;
=======
const kindsSelecter = $(".kinds-selecter");
const kindsInp =$("#kinds-inp");
var plusCnt =1;
>>>>>>> f40fe5d2e1264bde0baeacb43db5dfbb5247e3dc
$(chkbox).click(function () {
    if ($("#checkbox").prop("checked") == true) {
        $('ol').removeClass("close").addClass("open");
    } else {
        $('ol').removeClass("open").addClass("close");
    };
});
<<<<<<< HEAD

=======
$(kindsSelecter).click(function(){
    if(!$(kindsSelecter).hasClass("kinds-selecter-aft")){
    $(kindList).addClass("kind-list-aft");
    $(kindsSelecter).addClass("kinds-selecter-aft");
    }else{
        $(kindList).removeClass("kind-list-aft");
        $(kindsSelecter).removeClass("kinds-selecter-aft");
    }

});
>>>>>>> f40fe5d2e1264bde0baeacb43db5dfbb5247e3dc
$(kindsli).click(function () {
    if( flag == 0 ){
        flag = 1;
    }
    kindsli.removeClass("kind-Click");
<<<<<<< HEAD
    $(this).addClass("kind-Click")
    if($(this).text() == "その他" && !$(kinds).hasClass("kinds-aft") && flag == 1){
        console.log($(this).text());
        var input = $('<input type="text"/>');
        $(kinds).append(input);
        flag = 0;
    }else{
        $(kinds+'input:last-child').remove();
        console.log($(this).text());
=======
    $(this).addClass("kind-Click");
    if($(this).text() == "その他"){
        $(kinds).addClass("kinds-aft");
        kindsInp.val("");
    }else{
    // $(kinds).removeClass("kinds-aft");
    $(kinds).addClass("kinds-aft");
    kindsInp.val($(this).text());
>>>>>>> f40fe5d2e1264bde0baeacb43db5dfbb5247e3dc
    }
    $(kindList).removeClass("kind-list-aft");
    $(kindsSelecter).removeClass("kinds-selecter-aft");
});
<<<<<<< HEAD
    $(inptxt).click(function(event){
=======
    $(inptxt).click(function(event) {
>>>>>>> f40fe5d2e1264bde0baeacb43db5dfbb5247e3dc
        var test =$(inptxt).eq(event).parent();
    });
    $(plus).click(function(event) {
        plusCnt += 1;
        $(plus).before('<li><span>出勤者名' + plusCnt + '</span><input type="text" name="time"></li>');
=======
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
        if(!$(this).hasClass("kinds-selecter-aft")){
            $(this).addClass("kinds-selecter-aft");
            $(this).find(kindList).addClass("kind-list-aft");
        }else{
            $(this).removeClass("kinds-selecter-aft");
            $(this).find(kindList).removeClass("kind-list-aft");
        
        }
    });
    

// $(kindsSelecter).click(function(){
//     if(!$(kindsSelecter).hasClass("kinds-selecter-aft")){
//     $(kindList).addClass("kind-list-aft");
//     $(kindsSelecter).addClass("kinds-selecter-aft");
//     }else{
//         $(kindList).removeClass("kind-list-aft");
//         $(kindsSelecter).removeClass("kinds-selecter-aft");
//     }
// });
    
    $(kindsli).click(function () {
        var ListPush = $(this).parent();
        var kindadd = ListPush.parent().parent();
        ListPush.find(kindsInp).addClass("kind-Click");
        if($(this).text() == "その他"){
            kindadd.addClass("kinds-aft");
            kindadd.find(kindsInp).val("");
        }else{
            kindadd.addClass("kinds-aft");
            kindadd.find(kindsInp).val($(this).text());
        }
        ListPush.find(kindList).removeClass("kind-list-aft");
        ListPush.find(kindsSelecter).removeClass("kinds-selecter-aft");
    });
    
    
        $(inptxt).click(function(event) {
            var test =$(inptxt).eq(event).parent();
        });
        $(plus).click(function(event) {
            plusCnt+=1;
            $(plus).before('<li><span>出勤者名' + plusCnt + '</span><input type="text" name="time"></li>');
        });
>>>>>>> eb8fc792049bab6d0a3d65677b43f75114226c98
    });
    