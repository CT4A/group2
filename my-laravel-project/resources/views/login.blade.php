<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <!-- JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <title>ログイン　ページ</title>
</head>
<body>
    <div class="container-fluid">
        <form action="/login" method="POST">
            @csrf
            Email:  <input type="text" name="email" value=""><br>
            Password: <input type="password" name="password" id="">
        </form>
    </div>
</body>
</html>