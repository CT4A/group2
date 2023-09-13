$(document).ready(function(){
    let  HistoryInItem = ".history_info"
    $(HistoryInItem).click(function(){
        $(HistoryInItem).removeClass("history_info_aft");
        $(this).addClass("history_info_aft");
    });
});