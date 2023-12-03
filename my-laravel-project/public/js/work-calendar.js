    // document.addEventListener('DOMContentLoaded', function() {

        
        var calendarEl = document.getElementById('calendar');
        var valueToPass = ""
        var calendar = new FullCalendar.Calendar(calendarEl, {
            userSelect: 'text' ,
            initialView: 'dayGridMonth',
            locale: 'ja',
            height: 'auto',
            firstDay: 1,
            dayMaxEventRows: true, // 要素の数制限を有効にしてる
            views: {
                dayGrid: {
                dayMaxEventRows: 3 // 予定の最大数
            },
            },
            headerToolbar: {
                left: "today prev,next",
                center: "title",
                right: "dayGridMonth,listDay"
            },
            buttonText: {
                today: '現在',
                month: '月',
                list: 'リスト'
            },
            noEventsContent: 'スケジュールはありません',
            events:'/get_events',
            viewDidMount: function (view) {
                
                $(document).on("click",".fc-icon-x",function(clickElement){
                    $(".fc-popover").remove();
                });
                $(document).on("click",".fc-listDay-button",function(clickElement){
                    $(".fc-popover").remove();
                });
                $(document).on("click",".fc-daygrid-day",function(clickElement){
                    valueToPass = this.getAttribute("data-date");
                    var clickedElement = $(clickElement.target);
                    var test = $(".fc-view-harness");
                    var elementOffset = $(".fc-view-harness").offset();
                    var elementY = elementOffset.top;
                    localStorage.setItem("myValue",valueToPass);
                    let [year, month, day] = valueToPass.split('-');
                    let formattedDate = `${year}年${parseInt(month)}月${parseInt(day)}日`;
                    console.log(formattedDate)
                    clickedElement.focus();
                    // if(!$(clickedElement).hasClass("fc-daygrid-more-link")){
                    //     if($(clickedElement).hasClass("fc-daygrid-day-frame")){
                            
                            // window.location.href = "/shift-register";
                            // var client_rect = test.getBoundingClientRect();
                            var calendarX = clickElement.clientX ;
                            var calendarY = clickElement.clientY-elementY;
                            var HarnesPassiveY=document.getElementsByClassName("fc-view-harness-passive")[0];	
                            if( $(window).width() <=780){
                                calendarY = HarnesPassiveY.scrollTop;
                            }
                            $(".fc-popover").remove();
                            if(!$(clickElement.target).hasClass("fc-daygrid-more-link")){
                            $(".fc-view-harness").append("<div class='fc-popover fc-more-popover fc-day ' style='top: " + calendarY+ "px; left: " + calendarX + "px;'>"+
                                                        "<div class = fc-popover-header><span class ='fc-popover-title'>"+formattedDate+"</span>"+
                                                        "<span class ='fc-popover-close fc-icon fc-icon-x' title ='close'></span></div>"+
                                                        "<div class = fc-popover-body></div>"+
                                                        "</div>");
                            }
                            var childrenElements = $(".list").children();
                                childrenElements.each(function() {
                            });
                            var FcPopoverBody = $(".fc-popover-body");
                            FcPopoverBody.prepend("<div id = 'popover-body-EL'><button class ='shift-Btn'>シフト登録</button><button class ='reserve-Btn'>予約登録</button><button class ='event-Btn'>イベント追加</button></div>");
                        // }
                        // }
                    });
              },
        });
        calendar.render();

    $(document).ready(function(){
        const kindsli = $(".kinds li");
        const kindsSelecter = $(".kinds-selecter");
        var ShiftBtn = $("#popover-body-EL");
        $(document).on("click",".fc-daygrid-more-link",function(clickElement){
        async function doAsyncTask() {
            return new Promise(function(resolve) {
                setTimeout(function() {
                    resolve();
                }, );
            });
        }
        async function main() {
            await doAsyncTask();
            var FcPopoverBody = $(".fc-popover-body");
            var elementsWithUserSelectNone = document.querySelectorAll("[style*='user-select: none']");
            FcPopoverBody.prepend("<div id = 'popover-body-EL'><button class ='shift-Btn'>シフト登録</button><button class ='reserve-Btn'>予約登録</button><button class ='event-Btn'>イベント追加</button></div>");
            var popoverBodyEL = $(".popover-body-EL")
            test.append("<div><span>シフト登録</span> <input type = 'text'></div>");
            ShiftBtn = $("#popover-body-EL").find("button");
        }      
    });
    $(document).on("click",".kinds-selecter",function(event){
        const kindList = $(".kind-list");
        var ksSelecterPush = this
        event.stopPropagation();
        if(!$(ksSelecterPush).hasClass("kinds-selecter-aft")){
            $(".kinds-selecter").removeClass("kinds-selecter-aft");
            $(".kinds-selecter").find(kindList).removeClass("kind-list-aft");
            $(ksSelecterPush).addClass("kinds-selecter-aft");
            $(ksSelecterPush).find(kindList).addClass("kind-list-aft");
        }else{
            $(ksSelecterPush).removeClass("kinds-selecter-aft");
            $(ksSelecterPush).find(kindList).removeClass("kind-list-aft");
        }
    })
    // プルトダウン(選択後の処理)
    $(document).on("click",".kinds li",function (event) {
        event.stopPropagation();
        const kindsInp =$(".kinds-inp");
        const kindList = $(".kind-list");
        const kindsInpHidden =$(".kinds-inp-hidden");
        var thisList = $(this).parent();
        var ListPush = thisList.parent().parent();
        thisList.find(kindsInp).addClass("kind-Click");
            if(!$(this).hasClass("AccordionSearch")){
            if($(this).text() == "その他"){
                ListPush.addClass("kinds-aft");
                ListPush.find(kindsInp).val("");
                $(this).parent().parent(".kinds-selecter").removeClass("kinds-selecter-aft");
                $(this).parent().removeClass("kind-list-aft");
                $(".kindsSelecter").removeClass("kind-list-aft");
            }else{
                ListPush.addClass("kinds-aft");
                ListPush.find(kindsInp).val($(this).text());
                ListPush.find(kindsInpHidden).attr('value', $(this).attr('data'));
                thisList.find(kindList).removeClass("kind-list-aft");
                $(this).parent().parent(".kinds-selecter").removeClass("kinds-selecter-aft");
                $(this).parent().removeClass("kind-list-aft");
                $(".kindsSelecter").removeClass("kind-list-aft");
            }
        }
    });
    
    $(document).on("click","#popover-body-EL button",function(BtnElement){
        var BtnEl = $(BtnElement.target);
        var FcPopoverBody = $(".fc-popover-body");
        var popoverBodyEL = $("#popover-body-EL");
        console.log("Onclick");
        $("#register-field").remove();
        if(BtnEl.hasClass("shift-Btn")){
            popoverBodyEL.after(
            '<section class="register" id = register-field>'+
            '<div class="register-area">'+
            '<h1>シフト登録</h1>'+
            '<form action="/shift-register" method="POST">'+
                '<ul class="register-areaUL">'+
                    '<li>'+
                        '<span>日付</span>'+
                        '<input type="date" name="request_date" value='+valueToPass+' id = "SelDate">'+
                    '</li>'+
                    '<li>'+
                        '<span>開始時間</span>'+
                        '<input type="time" name="start_time">'+
                    '</li>'+
                    '<li>'+
                        '<span>終了時間</span>'+
                        '<input type="time" name="end_time">'+
                    '</li>'+
                    '<li>'+
                        '<input type="checkbox" name="time" id="checkbox">'+
                        '<span>同伴がある場合はこちらをチェックしてください。</span>'+
                    '</li>'+
                    '<ol class="close">'+
                        '<li class="kinds">'+
                            '<span>同伴人数</span>'+
                            '<div class="kinds-selecter">'+
                            '<span>選択してください</span>'+
                            '<ul class="kind-list" id ="staffList">'+
                            '</ul> '+
                            '</div>'+
                            '<input type="text" id="num_people" class="kinds-inp" name="num_people"value="{{ old(num_people) }}">'+
                        '</li>'+
                    '</ol>'+
                '</ul>'+
                '<input type="submit" value="登録">'+
                '</form>'+
            '</div>'+
        '</section>');
        }else if(BtnEl.hasClass("reserve-Btn")){
            popoverBodyEL.after('<section class="register" id =register-field>'+
                                    '<div class="register-area">'+
                                    '<h1>予約</h1>'+
                                    '<form action="/reserve-register" method="POST">'+
                                        '<ul class="register-areaUL">'+
                                            '<li>'+
                                                '<span>顧客名</span>'+
                                                '<input type="text" name="customer_name">'+
                                            '</li>'+ 
                                            '<li>'+
                                                '<span>人数</span>'+
                                                '<input type="text" name="reserve_people">'+
                                        '</li>'+
                                        '<li>'+
                                            '<span>テーブル番号</span>'+
                                            '<input type="text" name="table_number">'+
                                        '</li>'+                     
                                        '<li class="kinds">'+
                                            '<span>担当者</span>'+
                                            '<div class="kinds-selecter">'+
                                                '<span>選択してください</span>'+
                                                '<ul class="kind-list" id ="staffList">'+
                                                '</ul> '+
                                            '</div>'+
                                            '<input type="text" id="staff_name" class="kinds-inp" name="staff_name">'+
                                            '<input type="text" id="staff_id" class="kinds-inp-hidden" name="staff_id" hidden>'+
                                        '</li>'+
                                        '<li>'+
                                            '<span>日付</span>'+
                                            '<input type="date" id="reserve_date" name="reserve_date" value="{{$today}}">'+
                                        '</li>'+
                                        '<li>'+
                                            '<span>予約時間</span>'+
                                            '<input type="text" name="reserve_time">'+
                                        '</li>'+
                                        '<li>'+
                                            '<span>制限</span>'+
                                            '<input type="text" name="upper_limit" placeholder="￥">'+
                                        '</li>'+
                                        '<li>'+
                                            '<span>備考</span>'+
                                            '<textarea name="remarks" ></textarea>'+
                                        '</li>'+
                                '</ul>'+
                                '<input type="submit" value="登録">'+
                            '</form>'+
                        '</div>'+
                    '</section>');
                    var htmlElement = ""
                    $.ajaxSetup({
                        headers:{
                            'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        type: "post",
                        url: "/get-list",
                        datatype:"json",
                        success: function (datas) {
                            // datass = JSON.parse(datass);
                            datas.forEach(element => {
                                htmlElement += '<li data="'+element["staff_id"]+'">'+element["staff_name"]+'</li>';
                            });
                            
                            $("#staffList").append(htmlElement);
                        },error: function(xhr, status, error) {
                            console.error("Ajaxリクエストエラー:", status, error);
                            // エラーが発生した場合の処理
                        }
                        })
        }else{
            popoverBodyEL.after("<section class='register' id ='register-field'>"+
                                    "<div class='register-area'>"+
                                        "<h1>お知らせ登録</h1>"+
                                        "<form action='' method='POST' id ='newsForm'>"+
                                        "<ul class = register-areaUL>"+
                                                "<li class='news-resist'>"+
                                                    "<span>内容</span>"+
                                                    "<textarea id='newsTextarea' name='remarks'></textarea>"+
                                                "</li>"+
                                                "<p id = 'NewsHidden'></p>"+
                                        "</ul>"+
                                        "<input type='submit' value='登録'>"+
                                        "</form>"+
                                    "</div>"+
                                " </section>");
                            }
    });
});
$(document).on("click","#checkbox",function () {
    var listnumber = ""
    if ($("#checkbox").prop("checked") == true) {
        $('ol').removeClass("close").addClass("open");
        for ($i = 1; $i < 50; $i++){
            listnumber += "<li>"+$i+"</li>";
        }
        $("#staffList").append(listnumber)
    } else {
        $('ol').removeClass("open").addClass("close");
    };
});
// function updatecalendarTitle(jsEvent , view ){
//     var updateTitlecalendar = document.getElementById('calendar');
//     var calendarTitle = document.getElementById("#calendar-month");
//     var currentTitle = updateTitlecalendar.FullCalendar('getView').title;
//     calendarTitle.text(currentTitle);
//     }
//     $('#calendar').fullCalendar('option','viewRender',updatecalendarTitle);
//     updatecalendarTitle();
