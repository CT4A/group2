$(document).ready(function(){
    var myValueID = localStorage.getItem("myValue");
    customerNumbeList =(".customer-number-list li");
    empNumberList = (".emp-number-list li");
    
    $(customerNumbeList).click(function () {
        $(customerNumbeList).removeAttr("id");
        $(this).attr("id","customer-select-number");
    });

    $(empNumberList).click(function () {
        $(empNumberList).removeAttr("id");
        $(this).attr("id","emp-select-number");
    });
    
    
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
    
    LoadProc();
    //出勤退勤の処理
    //顧客人数
    var cus_num = $('#customer-select-number span').text();;
    //担当人数
    var emp_num = $('#emp-select-number span').text();;
    //同伴率　＝　　顧客人数/担当人数
    var num_people;
    $("#customer-list li").click(function(){
        cus_num = $('#customer-select-number span').text();
    });
    $("#employee-list li").click(function(){
        emp_num = $('#emp-select-number span').text();
    });
    

    //出勤ボタンの処理
    $("#start").click(function(){
        var date = new Date();
        var day = date.getDate();
        var month = date.getMonth() + 1; 
        var year = date.getFullYear();
        //今日の日付
        var today = year + '-' + month + '-' + day;

        var hours = date.getHours();
        var minutes = date.getMinutes();
        var seconds = date.getSeconds();
        //現在の時間
        var now = hours + ':' + minutes + ':' + seconds;


        if(emp_num == 0){
            num_people = 0;
        }else{
            num_people = cus_num/emp_num; 
        }
    
        let data={
            'staff_id':myValueID,
            'work_date'  :today,
            'attend_time':now,
            'num_people' : num_people
        }
        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "post",
            url: "/syukkin/start",
            data: data,
            dataType: "json",
            success: function (message) {
                if(message.error){
                    window.location.href = "/list-attend";
                    alert("今日は出勤しました");
                }else{
                    alert("今日も頑張りましょう");
                    window.location.href = "/list-attend";
                }
            },
            error:function(){
                alert("エラーは発生しました。オーナに連絡してください。");
            }
        });

    });
    
    //退勤ボタンの処理
    $("#end").click(function(){
        var date = new Date();
        var day = date.getDate();
        var month = date.getMonth() + 1; 
        var year = date.getFullYear();
        //今日の日付
        var today = year + '-' + month + '-' + day;
        var hours = date.getHours();
        var minutes = date.getMinutes();
        var seconds = date.getSeconds();
        //現在の時間
        var now = hours + ':' + minutes + ':' + seconds;

        //送信データ。
        let data={
            'staff_id':myValueID,
            'work_date'  :today,
            'leaving_work':now
        }
        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "post",
            url: "/syukkin/end",
            data: data,
            success: function (message) {
                if(message.error){
                    alert(message.message);
                }else{
                    alert("本日お疲れ様でした。またね");
                window.location.href = "/list-attend";
                }
            }
          });
    });

});