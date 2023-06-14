$(document).ready(function(){
console.log("適応されているよ")
    const fillEle = $(".filter-element");
    var filterValue ={
        timeFilter  : 0,
        moneyFilter  : "",
        peopleFilter: ""
    };
    $(fillEle).click(function(){
        $(fillEle).removeClass("fileter-element-aft");
        if($(this).parent(".filter-element").has){
            console.log("成功")
        }
        if($(this).parent("#filter-people"))
        filterValue.timeFilter = this.getAttribute('data-filter');
        console.log(filterValue);
        filterValue=this.getAttribute('data-filter');
        console.log(filterValue);
        $(this).addClass("fileter-element-aft")
    })
});