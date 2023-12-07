$(document).ready(function(){
    const infoAft = $(".info-aft");
    const information = $(".information");
    const infoClose = $(".info-close");
    $(infoAft).on('click', function(event) {
    if ($(event.target).closest(infoClose).length && !(event.target).closest("header")) 
        {
        $('body').removeClass("info-aft").addClass("info");
        $(information).empty();
    }
    });
    $(empName).on('click', function(event) {
        event.stopPropagation();
        if($(event.information).closest("span").length) {
            $('body').addClass("intell-aft");
    }
    });
});