$(document).ready(function(){
    const fillEle = $(".filter-element");
    const billList = $(".bill-list-items ul li");
    const filterClear = $(".filter-clear");
    const filtertest = $(".fileter-element-aft");
    let BillSearch =""
    let BilStafName =""
    let BilCusName =""
    let test
    let BillCustomername = $(".bill-list-items ul .customer_name");
    let BillStafname = $(".bill-list-items ul .staff_name");
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
    $("#billSearch").keyup(function(e){
        BillSearch = $(this).val().toLowerCase();
        $(billList).each(function() {
            test = $(this).attr('data-filter').split(' ');
            BilStafName = $(this).find(".staff_name").text().toLowerCase();
            BilCusName = $(this).find(".customer_name").text().toLowerCase();
            if ((filterValue.timeFilter == test[0] || filterValue.timeFilter == "") &&
                (filterValue.moneyFilter == test[1] || filterValue.moneyFilter == "") &&
                (BilCusName.indexOf(BillSearch) !== -1 || BilStafName.indexOf(BillSearch) !== -1)) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    });
    $(fillEle).click(function(){
        var filselect = $(this).parent();
        if(!$(this).hasClass("fileter-element-aft")){
            $(this).removeClass("fileter-element-aft");
        switch (filselect.attr("id")) {
            case "time-filter":
                $(this).parent().find("button").removeClass("fileter-element-aft");
                $(this).addClass("fileter-element-aft");
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
            if(!$(this).hasClass("selectFilter")){
                BillSearch = $("#billSearch").val().toLowerCase();
                console.log(BillSearch)
                fillEle.removeClass("selectFilter");
                $(this).addClass("selectFilter"); 
                $(billList).each(function() {
                    test = $(this).attr('data-filter').split(' ');
                    BilStafName = $(this).find(".staff_name").text().toLowerCase();
                    BilCusName = $(this).find(".customer_name").text().toLowerCase();
                    console.log(BilStafName);
                    if ((filterValue.timeFilter == test[0] || filterValue.timeFilter =="") &&
                        (filterValue.moneyFilter == test[1] ||filterValue.moneyFilter =="")&&
                        (BilCusName.indexOf(BillSearch) !== -1 || BillSearch =="") &&
                        (BilStafName.indexOf(BillSearch) !== -1 || BillSearch == "" )) {
                            $(this).show();
                        }else{
                            $(this).hide();
                    }
                })
    }else{
        $(billList).show();
        $(this).removeClass("selectFilter");
        $(this).removeClass("fileter-element-aft");
    }
    }else{
        $(billList).show();
        $(this).removeClass("selectFilter");
        $(this).removeClass("fileter-element-aft");
    }
    })
});