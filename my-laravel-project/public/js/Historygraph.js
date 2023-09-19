// const { response } = require("express");
$(document).ready(function() {
    var G_staffs       = null;
    var G_staff_name   = null;
    var G_attend_time  = null;
    var G_leaving_work = null;
    fetch('https://into-the-program.com/wp-json/wp/v2/posts/6129') //URLを記述
    .then(response => response.json())
    .then(data =>{
            const work_data = data.G_work_data; 
            const staffs= data.G_staffs ;
            const staff_name = data.G_staff_name ;
            const attend_time = data.G_attend_time;
            const leaving_work = data.G_leaving_work;
            console.log(work_data) 
    })
    .catch(error => {
        alert("失敗"+error)
        console.log(error)
    });
    
    $.ajax({
        url:"",
        method:"GET",
        dataType:"json",
        success:function(data){
            console.log(data);
        },
        error:function(xhr,status,error){
            console.log(error)
        }
    });
    console.log("test");
    var canvas = $("#graph")[0]; // canvas要素を取得
    var ctx = canvas.getContext("2d"); // 2D描画コンテキストを取得
    var data1 = {
        label: "データセット1",
        data: [5, 15, 25, 14, 25,5, 15, 25, 16, 5,9,10], // データポイント
        borderColor: "rgba(75, 192, 192, 0.3)", // 折れ線の色
        backgroundColor: "rgba(75, 192, 192, 0.3)", // 折れ線の色
        fill: false // 折れ線の下を塗りつぶさない
      };
      var data2 = {
        label: "データセット2",
        data: [12, 19, 3, 5, 2,12, 19, 3, 5, 2,4,20], // データポイント
        borderColor: "rgba(238, 48, 51,0.3)", // 折れ線の色
        backgroundColor: "rgba(238, 48, 51,0.3)", // 折れ線の色
        fill: false // 折れ線の下を塗りつぶさない
      };
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['1月', '2月', '3月', '4月', '5月','6月','7月','8月','9月','10月','11月','12月'], 
            datasets:[data1,data2]
        },
        options: {
            // responsive:false,
            maintainAspectRadio:false,
            plugins:{
                // ホバー情報
                tooltip:{
                    backgroundColor:"rgba(0,0,0,1)", 
                },
                // タイトル
                title:{
                    display:false,
                }
            },
            // グラフの情報
            scales:{
                x:{
                    display:true,
                },
                y:{
                    display:true,
                }
            },
            // グラフのオプションを設定
            datasets:[
                {
                label:'',
                
            }]

        }
    });
});
