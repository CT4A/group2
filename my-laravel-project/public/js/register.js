$(document).ready(function(){
    const chkbox = $("#checkbox");
    const inptxt = $("input[type='text']");
    const plus = $(".plus");
    const kindsli = $(".kinds li");
    const kinds = $(".kinds");
    const kindList = $(".kind-list");
    const kindsSelecter = $(".kinds-selecter");
    const kindsInp =$(".kinds-inp");
    const kindsInpHidden =$(".kinds-inp-hidden");
    const AccordionSearchInput = $(".AccordionSearchInput")
    var plusCnt =1;

    // カレンダーのデータ送信　編集用
    var myValue = localStorage.getItem("myValue");
    var targetElement = $("#SelDate"); // 挿入する要素を選択
    $(targetElement).val(myValue);
    
    // accordionリストの検索機能
    $(AccordionSearchInput).keyup(function (e) {
        var keySearch = $(this).val();
        let staffList = $(".kind-list li");
        staffList.show();
        for (let i = 0; i < staffList.length; i++) {
          if (staffList[i].textContent.indexOf(keySearch) == -1 && i >= 1) {
            $(staffList).eq(i).hide();
          }
        }
    });
    $(chkbox).click(function () {
        if ($("#checkbox").prop("checked") == true) {
            $('ol').removeClass("close").addClass("open");
        } else {
            $('ol').removeClass("open").addClass("close");
        };
    });

    $(kindsSelecter).on("click",function(event){
        var ksSelecterPush = $(this)
        event.stopPropagation();
        if(!$(ksSelecterPush).hasClass("kinds-selecter-aft")){
            $(kindsSelecter).removeClass("kinds-selecter-aft");
            $(kindsSelecter).find(kindList).removeClass("kind-list-aft");
            $(ksSelecterPush).addClass("kinds-selecter-aft");
            $(ksSelecterPush).find(kindList).addClass("kind-list-aft");
        }else{
            $(ksSelecterPush).removeClass("kinds-selecter-aft");
            $(ksSelecterPush).find(kindList).removeClass("kind-list-aft");
        }
    })
    // プルトダウン(選択後の処理)
    $(kindsli).on("click",function (event) {
        event.stopPropagation();
        var thisList = $(this).parent();
        var ListPush = thisList.parent().parent();
        thisList.find(kindsInp).addClass("kind-Click");
            if(!$(this).hasClass("AccordionSearch")){
            if($(this).text() == "その他"){
                ListPush.addClass("kinds-aft");
                ListPush.find(kindsInp).val("");
                $(this).parent().parent(".kinds-selecter").removeClass("kinds-selecter-aft");
                $(this).parent().removeClass("kind-list-aft");
                $(kindsSelecter).removeClass("kind-list-aft");
            }else{
                ListPush.addClass("kinds-aft");
                ListPush.find(kindsInp).val($(this).text());
                ListPush.find(kindsInpHidden).attr('value', $(this).attr('data'));
                thisList.find(kindList).removeClass("kind-list-aft");
                $(this).parent().parent(".kinds-selecter").removeClass("kinds-selecter-aft");
                $(this).parent().removeClass("kind-list-aft");
                $(kindsSelecter).removeClass("kind-list-aft");
            }
            console.log(this.tagName)
        }
    });
        // 入力項目の追加
        $(inptxt).click(function(event) {
            var test =$(inptxt).eq(event).parent();
        });

        plusCnt += 1; 
        var previousElements = $('.customerList').eq(0);
        var ListClone = previousElements.clone();
        $($(this)).parent().before(ListClone);
        $(plus).click( function(event) {
            clone();
        });
        function clone(){
            plusCnt += 1; 
            var previousElements = $('.customerList');
            var ListClone = previousElements.clone();
            $(plus).parent().before(ListClone);
        }
    $(".alcohol li").click(function (event) { 
        const clickedElement = event.target;
        if (clickedElement.tagName === "LI" ) {

            let liquor_type=clickedElement.textContent;
            let liquor_id=clickedElement.textContent;
            $(".liquorType").addClass("kinds-aft")
            $("#liquor_id").val(liquor_id);
            
        }
    });

        
        //クリックイベントの処理
        $(".liquorName ul").click(function(event){
            const clickedElement = event.target;
            if (clickedElement.tagName === "LI" ) {

                let liquor_name=clickedElement.textContent;
                $(".liquorType").addClass("kinds-aft")
                $("#liquor_name").val(liquor_name);
                //選択した酒のすべての種類をゲットする
                $.ajaxSetup({
                    headers:{
                        'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "post",
                    url: "/getLiquorType/{liquor_name}",
                    data:{ "liquor_name":liquor_name,
                    },
                    datatype:"json",
                    success: function (datas) {
                        showInfo(datas);
                    }
                });
            }
        })
        //酒の種類リストを作る。
        function showInfo(datas) {
            let htmlString="";
            datas.forEach(data => {
                htmlString +="<li data-id = "+data["liquor_id"]+">"+data["liquor_type"]+"</li>";
            });
            $(".alcohol ul").html(htmlString);
        }
    // 金額に自動的追加　”、”　
    function updateTextView(_obj) {
        var num = getNumber(_obj.val());
        if(num==0){
        _obj.val('');
        }else{
        _obj.val(num.toLocaleString());
        }
    }
    function getNumber(_str){
    var arr = _str.split('');
    var out = new Array();
    for(var cnt=0;cnt<arr.length;cnt++){
    if(isNaN(arr[cnt])==false){
        out.push(arr[cnt]);
    }
    }
    return Number(out.join(''));

    }

    // $('input[placeholder=￥]').on('keyup',function(){
    // updateTextView($(this));
    // });


    //   time
    var date = new Date();
    var year = date.getFullYear();
    var month = date.getMonth() + 1;
    var day = date.getDate();
    var hour = date.getHours();
    var minute = date.getMinutes();
    if (month < 10) month = "0" + month;
    if (day < 10) day = "0" + day;
    var today = year + "-" + month + "-" + day;
    $("#theDate").value = today;
    // document.getElementById('theDate').value = today;
    //bill-registerの社員名クリックの処理：
    $('#staffList li').click(function () {
        let staff_name = $(this).text();
        let staff_id = $(this).attr('data');
        $('#staff_name').css({'height':'auto','width':'100%'}).val(staff_name);
        $('#staff_id').val(staff_id);
    });
    $('#customerList li').click(function () {
        let staff_name = $(this).text();
        let staff_id = $(this).attr('data');
        $('#customer_name').val(staff_name);
        $('#customer_id').val(staff_id);
    });
    var callback = function(mutationsList, observer) {
        const kinds = $(".kinds");
        const kindList = $(".kind-list");
        const kindsSelecter = $(".kinds-selecter");
        const kindsli = $(".kinds li");
        const kindsInp =$(".kinds-inp");
        const kindsInpHidden =$(".kinds-inp-hidden");

        // リストを表示する
        $(".customerList").off('click').on('click', function() {
            const ThisFind = $(this).find(".kinds-selecter");
            if(!$(ThisFind).hasClass("kinds-selecter-aft")){
                $(kindsSelecter).removeClass("kinds-selecter-aft");
                $(kindsSelecter).find(kindList).removeClass("kind-list-aft");
                $(ThisFind).addClass("kinds-selecter-aft");
                $(ThisFind).find(".kind-list").addClass("kind-list-aft");
            }else{
                $(ThisFind).removeClass("kinds-selecter-aft");
                $(ThisFind).find(".kind-list").removeClass("kind-list-aft");
            }
        });
        //   リストを選択する
        $(kindsli).click(function () {
            var thisList = $(this).parent();
            var ListPush = thisList.parent().parent();
            thisList.find(kindsInp).addClass("kind-Click");
                if($(this).text() == "その他"){
                    $(kinds).addClass("kinds-aft");
                    ListPush.find(kindsInp).val("");
                }else{
                    ListPush.addClass("kinds-aft");
                    ListPush.find(kindsInp).val($(this).text());
                    ListPush.find(kindsInpHidden).attr('value', $(this).attr('data-id'));
                    thisList.find(kindList).removeClass("kind-list-aft");
                    thisList.find(kindsSelecter).removeClass("kinds-selecter-aft");
                    $(kindsSelecter).removeClass("kind-list-aft");
                }
            
        });
        };
      var observer = new MutationObserver(callback);
      var targetNode = $('.register-areaUL')[0];
      var options = { childList: true, subtree: true };
      observer.observe(targetNode, options);
});
$(window).on('load', function (){
    var date = new Date();
    $("input[type='time']").val(date.toISOString().split('T')[0]);
});
// newsform　送信禁止
var newsForm = document.getElementById("newsForm");
var NewsHidden = document.getElementById("NewsHidden");
newsForm.addEventListener("submit", function(event) {
    var textareaValue = document.getElementById("newsTextarea").value;
    if (textareaValue.trim() === "") {
        event.preventDefault(); // フォーム送信を阻止
        NewsHidden.textContent ="テキストを入力してください";
    }else if(textareaValue.length >= 255){
        event.preventDefault(); // フォーム送信を阻止
        NewsHidden.textContent ="文字を255文字以内にしてください";
    }
});