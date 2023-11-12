    // document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            locale: 'ja',
            height: 'auto',
            firstDay: 1,
            dayMaxEventRows: true, // for all non-TimeGrid views
            views: {
                dayGrid: {
                dayMaxEventRows: 5 // adjust to 6 only for timeGridWeek/timeGridDay
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
            // dayCellDidMount : function(e) {
            //     var el = e.el.querySelector('.fc-daygrid-day-number');
            // },
            calendarEl.addEventListener('click', function (event) {
                var target = event.target;
                if (target.classList.contains('fc-day')) {
                  console.log("test");
                  var valueToPass = target.getAttribute("data-date");
                  localStorage.setItem("myValue", valueToPass);
                  window.location.href = "/shift-register";
                }
              });
            },
            noEventsContent: 'スケジュールはありません',
            events:'/get_events',
            
            viewDidMount: function (view) {
            $(".fc-day").click(function(){
                console.log("test")
                window.valueToPass= this.getAttribute("data-date");
                localStorage.setItem("myValue",valueToPass);
                window.location.href = "/shift-register";
            });
              }
        });
        calendar.render();
    // });
function updatecalendarTitle(){
    var updateTitlecalendar = document.getElementById('calendar');
    var calendarTitle = document.getElementById("#calendar-month");
    var currentTitle = updateTitlecalendar.FullCalendar('getView').title;
    calendarTitle.text(currentTitle);
    }
    $('#calendar').fullCalendar('option','viewRender',updatecalendarTitle);
    updatecalendarTitle();