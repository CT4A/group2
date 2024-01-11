$(document).ready(function()
{
  console.log("hello");
    //編集ボタンクリック処理
    $("#editBtn").click(function (e) { 
        e.preventDefault();
        var staff_id = $("#staff_id").text();
        alert(staff_id);
        // console.log(staff_id);
        if(staff_id != 0){
          console.log("run if");
          window.location.href = "/emp-editor?id=" + staff_id;
        }else{
          alert("スタッフを選択してください。");
        }
    });
});