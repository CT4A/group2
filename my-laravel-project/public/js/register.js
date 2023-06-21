$(document).ready(function(){
    const chkbox = $("#checkbox");
    const inptxt = $("input[type='text']");
    const plus = $(".plus");
    const kindList = $(".kind-list");
    const kinds = $(".kinds");
    const kindsli = $(".kinds li");
    const kindsSelecter = $(".kinds-selecter");
    const kindsInp =$(".kinds-inp");
    const kindsInpHidden =$(".kinds-inp-hidden");
    var plusCnt =1;
    
    
    $(chkbox).click(function () {
        if ($("#checkbox").prop("checked") == true) {
            $('ol').removeClass("close").addClass("open");
        } else {
            $('ol').removeClass("open").addClass("close");
        };
    });
    
    //プルトダウン(リストの表示)
    $(kindsSelecter).click(function(){
        if(!$(this).hasClass("kinds-selecter-aft")){
            $(this).addClass("kinds-selecter-aft");
            $(this).find(kindList).addClass("kind-list-aft");
        }else{
            $(this).removeClass("kinds-selecter-aft");
            $(this).find(kindList).removeClass("kind-list-aft");
        }
    });

    // プルトダウン(選択後の処理)
    $(kindsli).click(function () {
        var thisList = $(this).parent();
        var ListPush = thisList.parent().parent();
        thisList.find(kindsInp).addClass("kind-Click");
        if($(this).text() == "その他"){
            $(kinds).addClass("kinds-aft");
            ListPush.find(kindsInp).val("");
        }else{
            console.log($(this).text())
            ListPush.addClass("kinds-aft");
            ListPush.find(kindsInp).val($(this).text());
            ListPush.find(kindsInpHidden).attr('value', $(this).attr('data'));
        }
        thisList.find(kindList).removeClass("kind-list-aft");
        thisList.find(kindsSelecter).removeClass("kinds-selecter-aft");
        $(kindsSelecter).removeClass("kind-list-aft");
    });
        // 入力項目の追加
        $(inptxt).click(function(event) {
            var test =$(inptxt).eq(event).parent();
        });
        $(plus).click(function(event) {
            plusCnt+=1; 
                        // <li class="kinds">
                        // <span>顧客名</span>
                        // <div class="kinds-selecter">
                        //     <span>選択してください</span>
                        //     <ul class="kind-list" id="customerList">
                        //         @foreach ($customers as $customer)
                        //             <li data='{{$customer->customer_id}}'>{{$customer->customer_name}}</li>
                        //         @endforeach
                        //     </ul>
                        // </div>
                        // <input type="text" id="customer_name" class="kinds-inp" name="customer_name" value="{{ old('customer_name') }}">
                        // <input type="text" id="customer_id" class="kinds-inp-hidden" name="customer_id" value="{{ old('customer_id') }}" hidden>
                        // @if ($errors->has('customer_id'))
                        // <span class="error">{{ $errors->first('customer_id') }}</span>
            // $(plus).before('<li><span>出勤者名' + plusCnt + '</span><input type="text" name="time"></li>');
            $(plus).before('<li class ="kinds">'+
                            '<span>顧客名'+plusCnt+'</span>'+
                            '<div class="kinds-selecter" ><span>選択してください</span>'+
                            '<ul class ="kind-list ')+
                            $each(customers,function(index,customer){
                                var liElement = $("<li>").attr("data", customer.customer_id).text(customer.customer_name);
                            });
                            +'<input type="text" id="customer_name" class="kinds-inp" name="customer_name" value="{{ old("customer_name") }}">'+
                            '<input type="text" id="customer_id" class="kinds-inp-hidden" name="customer_id" value="{{ old("customer_id") }}" hidden>'
        });

    $(".alcohol li").click(function (e) { 
        let liquor_type = $(this).text();
        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
            }
        });
          $.ajax({
            type: "post",
            url: "/getLiquorType/{liquor_name}",
            data: {"liquor_type":liquor_type
                },
            datatype:"json",
            success: function (datas) {
              showInfo(datas);
            }
          });
    });

        //酒の種類リストを作る。
        function showInfo(datas) {
            let htmlString="";
            datas.forEach(data => {
                htmlString +="<li data-value = "+data["liquor_id"]+">"+data["liquor_name"]+"</li>";
            });
            $(".liquorType ul").html(htmlString);
        }
        //クリックイベントの処理
        $(".liquorType ul").click(function(event){
            const clickedElement = event.target;
            if (clickedElement.tagName === "LI" ) {
                let liquor_name=clickedElement.textContent;
                let liquor_id = clickedElement.dataset.value;
                console.log("id :"+liquor_id);
                console.log("Clicked liquorType: " + liquor_name);
                $(".liquorType").addClass("kinds-aft")
                $("#liquor_name").val(liquor_name);
                $("#liquor_id").attr("value",liquor_id); 
            }
        })
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

    $('input[placeholder=￥]').on('keyup',function(){
    updateTextView($(this));
    });


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


    document.getElementById('theDate').value = today;

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
});
