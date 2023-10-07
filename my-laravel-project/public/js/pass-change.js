$(document).ready(function(){
    passSubmit = document.getElementById("passSubmit");
    passSubmit.addEventListener("submit", function(event) {
alert("te...................st");
        $(empName).on('click', function(event) {
            event.stopPropagation();
            var id = $(this).attr("id");
            if($(event.target).closest("span").length) {
                $('body').addClass("intell-aft");
            }
            $.ajaxSetup({
                headers:{
                'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "post",
                url: "/getInfoStaff/{id}",
                data: {"id":id
                },
                success: function (data) {
                showInfo(data[0]);
                }
            });
        });
    });
});