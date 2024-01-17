// const { response } = require("express");
$(document).ready(function() {
    var currentYear = new Date().getFullYear();
    console.log(currentYear)
    var Dataid = parseInt($("#staff_name").attr("data-id"));
    console.log(Dataid)
    let monthDate = {
        "1月":0,
        "2月":0,
        "3月":0,
        "4月":0,
        "5月":0,
        "6月":0,
        "7月":0,
        "8月":0,
        "9月":0,
        "10月":0,
        "11月":0,
        "12月":0,
    };
    var graphData =[]
    $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url:"graphHistory",
        data:{"Dataid":Dataid},
        method:"POST",
        async:false,
        dataType:"json",
        success:function(data){
            graphData = data;
            graphData.forEach(function(element) {
                console.log(element.FormatMonth)
                let graphmonth = element.FormatMonth;
                graphmonth = graphmonth.replace(/^0+/, "");
                monthDate[graphmonth+"月"] = parseInt(element.totalHours);
            });
        },
        error:function(xhr,status,error){
        }
    });

    var canvas = $("#graph")[0]; // canvas要素を取得
    var ctx = canvas.getContext("2d"); // 2D描画コンテキストを取得
    var data1 = {
        label: currentYear+"年",
        data: monthDate, // データポイント
        borderColor: "rgba(0, 0, 0, 1)", // 折れ線の色
        backgroundColor: "rgba(0, 0, 0, 0.3)", // 折れ線の色
        fill: false // 折れ線の下を塗りつぶさない
      };
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            // labels: ['1月', '2月', '3月', '4月', '5月','6月','7月','8月','9月','10月','11月','12月'], 
            datasets:[data1]
        },
        options: {
            responsive:false,
            maintainAspectRadio:false,
            // events: [], // クリックイベントを無効にする
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
                    suggestedMax: 100 // メモリの最大値を設定
                }
            },
            // グラフのオプションを設定
            datasets:[
                {
                label:'',
                
            }]
        }
    });
    console.log(myChart.data.labels); // グラフのラベルをコンソールに出力
    console.log(myChart.data.datasets[0].data); // グラフのデータをコンソールに出力
});
