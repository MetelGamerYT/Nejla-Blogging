<?php
    require "config.php";
    if(isset($_POST["post_blog"])) {
        try {
            $date = strval(date("d M Y", strtotime("now")));
            global $con;
            $stmt = $con->prepare("INSERT INTO posts(Title, Date, Content) VALUES(:title, :date, :content)");
            $stmt->bindParam(":title", $_POST["blogging_title"]);
            $stmt->bindParam(":date", $date);
            $stmt->bindParam(":content", $_POST["quillContent"]);
            $stmt->execute();

            $url = $discord_webhook;
            $headers = [ 'Content-Type: application/json; charset=utf-8' ];
            $POST = [ 'username' => 'Nejla Blogging - Update', 'content' => 'A new blog post was uploaded called: '.$_POST["blogging_title"] ];
            
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($POST));
            $response   = curl_exec($ch);
        }catch(PDOException $e) {
            echo "Fehler: ". $e->getMessage();
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nejla | Create Blog</title>
    <link rel="shortcut icon" href="https://i.imgur.com/6XhdPxi.png" type="image/x-icon">
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body class="container my-3 p-3 bg-body">
    <h1>Create new blog post</h1>
    <br>
    <form action="index.php" method="post">
        <input type="text" class="form-control" id="blogging_title" name="blogging_title" style="color: black;" value="Title">
        <br>
        <div id="editor" name="editor">
        </div>
        <input type="hidden" name="quillContent" id="quillContent">
        <button class="btn btn-outline-success" type="submit" name="post_blog">Share</button>
    </form>
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <script>
        var toolbarOptions = [
            ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
            ['blockquote', 'code-block'],

            [{ 'header': 1 }, { 'header': 2 }],               // custom button values
            [{ 'list': 'ordered'}, { 'list': 'bullet' }],
            [{ 'script': 'sub'}, { 'script': 'super' }],      // superscript/subscript
            [{ 'indent': '-1'}, { 'indent': '+1' }],          // outdent/indent
            [{ 'direction': 'rtl' }],                         // text direction

            [{ 'size': ['small', false, 'large', 'huge'] }],  // custom dropdown
            [{ 'header': [1, 2, 3, 4, 5, 6, false] }],

            [{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme
            [{ 'font': [] }],
            [{ 'align': [] }],

            ['clean']                                         // remove formatting button
        ];

        var quill = new Quill('#editor', {
            modules: {
                toolbar: toolbarOptions
            },
            theme: 'snow'
        });

        quill.on('text-change', function() {
            var quillContent = document.getElementById('quillContent');
            quillContent.value = quill.root.innerHTML;
        });
    </script>
</body>
</html>