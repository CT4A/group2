$(document).ready(function(){
    function LoadProc(){
      setInterval(function(){
        var now = new Date();
        var tar = $(".currDate, .currTime");
        var year = now.getFullYear();
        var month = now.getMonth()+1;
        var date = now.getDate();
        var hour = now.getHours();
        var min = now.getMinutes();
        var sec = now.getSeconds();
        var dayOfWeek = now.getDay();
        var dayOfWeekStr = ['日', '月', '火', '水', '木', '金', '土'][dayOfWeek];
        tar.each(function(){
            if($(this).hasClass("currDate"))
            {
                if (month < 10 ) month = "0" +  month;
                if (date < 10) date = "0" + date; 
                $(this).html(year + "年" + month + "月" + date + "日("+dayOfWeekStr+")");
            } else {
                if(hour < 10) hour = "0" + hour;
                if(min < 10)  min  = "0" + min;
                if(sec < 10)  sec  = "0" + sec;
                $(this).html(hour + ":" + min + ":" + sec);
            };
        });
    },1000);
    };
    $(".test").click(function(){
    });
    LoadProc();
});