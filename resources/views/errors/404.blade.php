<!DOCTYPE html>
    <html lang="en" >
        <head>
            <meta charset="UTF-8">
            <title>404 not found page</title>
            <link rel="stylesheet" href="{{asset('errorpage/style.css')}}">
            <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@600;900&display=swap" rel="stylesheet">
        </head>
        <body>
        <!-- partial:index.partial.html -->
            <div class="mainbox">
                <div class="err">4</div>
                <i class="far fa-question-circle fa-spin"></i>
                <div class="err2">4</div>
                <div class="msg">Maybe this page moved? Got deleted? Is hiding out in quarantine? Never existed in the first place?<p>Let's go <a href="{{route('home')}}">home</a> and try from there.</p></div>
            </div>
        <!-- partial -->
        <script src="./errorpage/style.js" crossorigin="anonymous"></script>
        </body>
    </html>
