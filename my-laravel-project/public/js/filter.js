$(document).ready(function(){
    $(".filter-element").click(function(){
        console.log("test");
        var filterValue = $(this).data("filter");
        if(filterValue === "all"){
            $(".item").show();
        }else{
            $(".item").hide();
            $(".item" + filterValue).show();
        }
    })
})