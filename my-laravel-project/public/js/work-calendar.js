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
        noEventsContent: 'スケジュールはありません',
        events:'/get_events',
    });
    calendar.render();
});
