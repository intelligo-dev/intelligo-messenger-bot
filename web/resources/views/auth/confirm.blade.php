<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Бүртгэлээ баталгаажуулах хэсэг</title>
</head>
<body>


<h1>Бүртгүүлсэн таньд баярлаа!</h1>


<p>
    Та бүртгэлээ баталгаажуулна уу <a href='{{ url("register/confirm/{$user->token}") }}'>мэйл</a>!
</p>


</body>
</html>