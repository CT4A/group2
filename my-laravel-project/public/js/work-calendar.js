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
$(document).ready(function () {
  // FullCalendarを初期化する
  var calendar = new FullCalendar.Calendar(document.getElementById('calendar'), {
    // FullCalendarのオプション設定...
  });

  // FullCalendarのイベントリスナーを削除する関数
  function disableFullCalendarWidthAdjustment() {
    calendar.off('windowResize', calendar.updateSize);
  }

  // 別のスクリプトやイベントによって、FullCalendarの横幅変更を無効化する必要がある場合にこの関数を呼び出す
  disableFullCalendarWidthAdjustment();

});