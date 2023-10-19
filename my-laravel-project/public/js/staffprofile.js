$(document).ready(function(){
    //編集ボタンクリック処理
    $("#editBtn").click(function (e) { 
        e.preventDefault();
        var staff_id = $("#staff_id").text();
        if(staff_id!=0){
          window.location.href = "/emp-editor?id=" + staff_id;
        }else{
          alert("スタッフを選択してください。");
        }
    });
});