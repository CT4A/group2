$(document).ready(function(){
    const infoAft = $(".info-aft");
    const information = $(".information");
    const infoClose = $(".info-close");
    $(infoAft).on('click', function(event) {
    if ($(event.target).closest(infoClose).length && !(event.target).closest("header")) 
        {
        //console.log(information.before)
        $('body').removeClass("info-aft").addClass("info");
        $(information).empty();
    }
    });
    $(empName).on('click', function(event) {
        event.stopPropagation();
        if($(event.information).closest("span").length) {
            //console.log("test");
            $('body').addClass("intell-aft");
    }
    });
});