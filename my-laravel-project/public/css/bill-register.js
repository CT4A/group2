function updateTextView(_obj){
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
  $(document).ready(function(){
    $('input[type=text]').on('keyup',function(){
      updateTextView($(this));
    });
  });



  var demo_input = document.getElementById('demo_input');

  var type_this = "￥";
  var index = 0;
  
  window.next_letter = function() {
      if (index <= type_this.length) {
          demo_input.value = type_this.substr(0, index++);
          setTimeout("next_letter()", 50);
      }
  }
  
  next_letter();