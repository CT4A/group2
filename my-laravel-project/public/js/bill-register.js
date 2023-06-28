window.addEventListener('DOMContentLoaded', function() {
    var input = document.getElementById('money');  
    // Xử lý sự kiện khi người dùng nhập vào input
    input.addEventListener('input', function() {
      // Lấy giá trị từ input và loại bỏ các ký tự không phải số
      var value = this.value.replace(/[^0-9]/g, '');
      // Định dạng giá trị thành chuỗi với dấu phẩy ngăn cách hàng nghìn
      var formattedValue = formatCurrency(value);
      // Gán giá trị đã định dạng vào input
      this.value = formattedValue;
    });
    // Hàm định dạng số tiền với dấu phẩy ngăn cách hàng nghìn
    function formatCurrency(value) {
      // Kiểm tra nếu giá trị không hợp lệ
      if (value === '' || isNaN(value)) {
        return '';
      }
      // Chuyển đổi giá trị thành số và định dạng thành chuỗi với dấu phẩy
      var number = parseFloat(value);
      return number.toLocaleString('en-US');
    }
  });
  $(document).ready(function() {
      $('moneyinput').on('input', function () {
      var money = $(this).val().replace(/,/g, ''); // カンマを一旦削除
      var formattedValue = money.replace(/\B(?=(\d{4})+(?!\d))/g, ',');
      $(this).val(formattedValue);
    });
   });