<?php
    require "../admin/mysql.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nejla | Blogging</title>
    <link rel="shortcut icon" href="https://i.imgur.com/6XhdPxi.png" type="image/x-icon">
</head>
<style>
    body {
        padding: 0px;
        margin: auto;
        font-family: system-ui;
        box-sizing: border-box;
        height: 100vh;
        width: 100vw;
    }

    .container {
        width: 100%;
        height: 100%;
        display: flex;
    }

    .sidebar {
        min-width: 220px;
        background: rgb(255, 255, 255);
        padding: 24px 24px 16px;
        display: flex;
        flex-direction: column;
        color: rgb(102, 112, 133);
        font-weight: bold;
        font-size: 13px;
        line-height: 24px;
    }

    .sidebar-header {
        display: flex;
        gap: 8px;
        padding: 12px 10px;
        align-items: center;
    }

    .sidebar-body {
        display: flex;
        flex-direction: column;
        overflow-y: scroll;
    }

    .sidebar-body hr {
        width: 50%;
    }

    .sidebar-body > a {
        text-decoration: none;
        padding: 10px 14px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 8px;
        margin: 4px 0px;
        color: rgb(102, 112, 133);
    }

    .sidebar-body > a.active, 
    .sidebar-body a:hover {
        background: rgb(242, 244, 247);
        color: rgb(29, 41, 57);
        border-radius: 8px;
    }

    .sidebar-body a:hover .count,
    .sidebar-body > a.active .count {
        background: #1d2939;
        color: #ffffff;
    }

    .sidebar-body > a > div {
        display: flex;
        gap: 0.4rem;
    }

    .sidebar-body > a > p {
        display: flex;
        gap: 0.4rem;
    }

    .sidebar-body .count {
        background: rgb(242, 244, 247);
        padding: 2.5px 6px;
        color: rgb(52, 64, 84);
        border-radius: 6px;
    }

    .ql-syntax {
        color: white;
        background: #222;
        word-wrap: break-word;
        box-decoration-break: clone;
        padding: .1rem .3rem .2rem;
        border-radius: .2rem;
        overflow-x: auto;
    }

    .ql-align-center {
        text-align: center;
    }
</style>
<body>
    <header class="container">
        <div class="sidebar">
            <div class="sidebar-header"><span>Nejla - Posts</span></div>
            <div>
            <div class="sidebar-body">
                <a href="/blog/">
                    <div><span>&#127968 Home</span></div>
                </a>
                <hr>
                <?php 
                    $stmt = $con->prepare("SELECT * FROM posts ORDER BY id DESC");
                    $stmt->execute();
                    while($row = $stmt->fetch()){
                ?>
                <a href="<?php echo "index.php?id=".$row["ID"]; ?>">
                    <div>
                        <span><?php echo $row["Title"].""; ?><br>
                        <span style="font-size: 12px;"><?php echo $row["Date"]; ?></span></span>
                    </div>
                </a>
                <?php 
                    }
                ?>
                </div>
            </div>
        </div>
        <?php 
            if(isset($_GET["id"])) {
            $stmt = $con->prepare("SELECT * FROM posts WHERE ID = '".$_GET["id"]."'");
            $stmt->execute();
            while($row = $stmt->fetch()){
        ?> 
        <div style="align-content: center; width: 100%">
            <h1><?php echo $row["Title"]." - ".$row["Date"]; ?></h1>
            <hr>
            <?php echo $row["Content"] ?>
        </div>
        <?php 
            } }
        ?>
    </header>
</body>
</html>
<!--

