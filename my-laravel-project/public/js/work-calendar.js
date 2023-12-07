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
                    var elementOffset = $(".fc-view-harness").offset();
                    var elementY = elementOffset.top;
                    var HarnesPassive=document.getElementsByClassName("fc-view-harness-passive")[0];
                    localStorage.setItem("myValue",valueToPass);
                    let [year, month, day] = valueToPass.split('-');
                    let formattedDate = `${year}年${parseInt(month)}月${parseInt(day)}日`;
                    clickedElement.focus();
                            var calendarX = clickElement.clientX ;
                            var calendarY = clickElement.clientY-elementY;
                            if( $(window).width() <=780){
                                calendarY = HarnesPassive.scrollTop;
                                console.log("test");
                            }
                            $(".fc-popover").remove();
                            if(!$(clickElement.target).hasClass("fc-daygrid-more-link")){
                            $(".fc-view-harness").append("<div class='fc-popover fc-more-popover  fc-day '>"+
                                                        "<div class = fc-popover-header><span class ='fc-popover-title'>"+formattedDate+"</span>"+
                                                        "<span class ='fc-popover-close fc-icon fc-icon-x' title ='close'></span></div>"+
                                                        "<div class = fc-popover-body></div>"+
                                                        "</div>");
                            }
                            document.documentElement.style.setProperty('--calendarY', calendarY+"px");
                            document.documentElement.style.setProperty('--calendarX', calendarX+"px");
                            var FcPopoverBody = $(".fc-popover-body");
                            FcPopoverBody.prepend("<div id = 'popover-body-EL'><button class ='shift-Btn'>シフト登録</button><button class ='reserve-Btn'>予約登録</button><button class ='event-Btn'>イベント追加</button></div>");
                            var FcPopover = $(".fc-popover")[0];
                            var bottomPosition = HarnesPassive.offsetTop + HarnesPassive.offsetHeight;
                            var leftPosition = HarnesPassive.offsetLeft + HarnesPassive.offsetWidth;
                            var bottomFcPopover = FcPopover.offsetTop + FcPopover.offsetHeight;
                            var leftFcPopover = FcPopover.offsetLeft + FcPopover.offsetWidth;
                            var elementOffset = $(".fc-view-harness").offset();
                            var elementY = elementOffset.top;
                            console.log(elementY)
                            console.log("bottomFcPopover"+(bottomFcPopover+elementY))
                            console.log("bottomFcPopover"+FcPopover.offsetHeight)
                            console.log("bottomPosition"+bottomPosition)
                                //下にはみ出てしまった時の処理
                            if(bottomPosition < bottomFcPopover+elementY && $(window).width() >=780){
                                bottomPosition = bottomFcPopover -elementY -FcPopover.offsetHeight - (bottomFcPopover - bottomPosition)
                                document.documentElement.style.setProperty('--calendarY', bottomPosition+"px");
                            }
                            //横にはみ出てしまった時の処理
                            if(leftPosition < leftFcPopover && $(window).width() >=780 ){
                                leftPosition   = leftFcPopover - FcPopover.offsetWidth -(leftFcPopover - leftPosition) 
                                document.documentElement.style.setProperty('--calendarX', leftPosition+"px");    
                            }
                    });
                },
        });
        calendar.render();

    $(document).ready(function(){
        var HarnesPassive=document.getElementsByClassName("fc-view-harness-passive")[0];	
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
    $(document).on("click",".fc-daygrid-more-link",function(clickElement){ 
        var clickedElement = $(clickElement.target);
        var elementOffset = $(".fc-view-harness").offset();
        var elementY = elementOffset.top;
        clickedElement.focus();
        var calendarX = clickElement.clientX ;         //leftの座標
        var calendarY = clickElement.clientY-elementY; //topの座標	
        if( $(window).width() <=780){
            calendarY = HarnesPassive.scrollTop;
        }
        // var bottomPosition = HarnesPassive.offsetTop + HarnesPassive.offsetHeight;
        // var leftPosition = HarnesPassive.offsetLeft + HarnesPassive.offsetWidth;
        document.documentElement.style.setProperty('--calendarY', calendarY+"px");
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
        var popoverBodyEL = $("#popover-body-EL");
        var FcPopover = $(".fc-popover")[0];
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
                            '<input type="text" id="num_people" class="kinds-inp numInput" name="num_people" pattern="^[a-zA-Z0-9]+$" maxlength="2" value="{{ old(num_people) }}">'+
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
                                                '<input type="text" pattern="^[a-zA-Z0-9]+$" maxlength="2" value =0 name="reserve_people" class ="numInput" >'+
                                        '</li>'+
                                        '<li>'+
                                            '<span>テーブル番号</span>'+
                                            '<input type="text" pattern="^[a-zA-Z0-9]+$" maxlength="2" value =0 name="table_number" class ="numInput" >'+
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
                                            '<input type="time" name="reserve_time">'+
                                        '</li>'+
                                        '<li>'+
                                            '<span>制限</span>'+
                                            '<input type="text" pattern="^[a-zA-Z0-9]+$" maxlength="6" value =0 name="upper_limit" placeholder="￥" class ="numInput">'+
                                            // '<input type="text" pattern="^[a-zA-Z0-9]+$"  maxlength="5" value =0  name="upper_limit" placeholder="￥">'+
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
                            var bottomPosition = HarnesPassive.offsetTop + HarnesPassive.offsetHeight;
                            var leftPosition = HarnesPassive.offsetLeft + HarnesPassive.offsetWidth;
                            var bottomFcPopover = FcPopover.offsetTop + FcPopover.offsetHeight;
                            var leftFcPopover = FcPopover.offsetLeft + FcPopover.offsetWidth;
                            var elementOffset = $(".fc-view-harness").offset();
                            var elementY = elementOffset.top;
                            var elementOffset = $(".fc-view-harness").offset();
                            var elementY = elementOffset.top;
                            console.log("bottomFcPopover"+bottomFcPopover)
                            console.log("bottomPosition"+bottomPosition)

                                //下にはみ出てしまった時の処理
                            if(bottomPosition < bottomFcPopover && $(window).width() >=780){
                                bottomPosition = bottomFcPopover -elementY -FcPopover.offsetHeight - (bottomFcPopover - bottomPosition)
                                document.documentElement.style.setProperty('--calendarY', bottomPosition+"px");
                            }
                            //横にはみ出てしまった時の処理
                            if(leftPosition < leftFcPopover && $(window).width() >=780){
                                leftPosition   = leftFcPopover - FcPopover.offsetWidth -(leftFcPopover - leftPosition) 
                                document.documentElement.style.setProperty('--calendarX', leftPosition+"px");    
                            }
                            });
                        });
$(document).on('input','.numInput',function(){
    // 整数以外の文字を削除する
    console.log("test");
    this.value = this.value.replace(/[^0-9]/g, ''); 
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