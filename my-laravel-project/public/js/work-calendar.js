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
            el.textContent = el.textContent.replace("日","");
          },
        noEventsContent: 'スケジュールはありません',
        events:'/get_events',
    });
    calendar.render();
});
