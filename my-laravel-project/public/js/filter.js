$(document).ready(function(){
console.log("適応されているよ")
    const fillEle = $(".filter-element");
    const billList = $(".bill-list-items ul li");
    const filterClear = $(".filter-clear");
    const filtertest = $(".fileter-element-aft");
    var filterValue ={
        timeFilter   : "",
        moneyFilter  : "",
        peopleFilter : ""
    };
    $(filterClear).click(function(){
        $(fillEle).removeClass("fileter-element-aft");
        filterValue.timeFilter = "";
        filterValue.moneyFilter = "";
        $(billList).show();
    });
    $(fillEle).click(function(){
        $(billList).hide();
        var filselect = $(this).parent();
        if(!$(this).hasClass("fileter-element-aft")){
            console.log("test");
            $(this).removeClass("fileter-element-aft");
        switch (filselect.attr("id")) {
            case "time-filter":
                $(this).parent().find("button").removeClass("fileter-element-aft");
                $(this).addClass("fileter-element-aft");
                console.log($(this).data("filter"));
                filterValue.timeFilter = $(this).data('filter');
                break;
            case "money-filter":
                $(this).parent().find("button").removeClass("fileter-element-aft");
                $(this).addClass("fileter-element-aft")
                filterValue.moneyFilter = $(this).data('filter');
                break;
            default:
                break;
            }
        $(billList).filter(function() {
            test = $(this).attr('data-filter').split(' ');
            if((filterValue.timeFilter == test[0] || filterValue.timeFilter =="") &&
            (filterValue.moneyFilter == test[1] ||filterValue.moneyFilter =="")){
                $(this).show();
            }
        })
    }else{
        $(this).removeClass("fileter-element-aft")
    }
    })
    $(filtertest).click(function(){
        console.log("test");
    })
});