document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        locale: 'ja',
        height: 'auto',
        firstDay: 1,
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
        dayCellDidMount : function(e) {
            var el = e.el.querySelector('.fc-daygrid-day-number');
        },
        noEventsContent: 'スケジュールはありません',
        events:'/get_events',
    });
    calendar.render();
});
$(document).ready(function () {
    $(".fc-day").click(function(){
        window.valueToPass= this.getAttribute("data-date");
        localStorage.setItem("myValue",valueToPass);
        window.location.href = "/shift-register";
    });
});
function updatecalendarTitle(){
  console,log("test");
  var updateTitlecalendar = document.getElementById('calendar');
  var calendarTitle = document.getElementById("#calendar-month");
  var currentTitle = updateTitlecalendar.FullCalendar('getView').title;
  calendarTitle.text(currentTitle);
}
$('#calendar').fullCalendar('option','viewRender',updatecalendarTitle);

updatecalendarTitle();
// });
