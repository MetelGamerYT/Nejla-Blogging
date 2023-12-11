
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
        background: #161616;
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

    .sidebar-body .count {
        background: rgb(242, 244, 247);
        padding: 2.5px 6px;
        color: rgb(52, 64, 84);
        border-radius: 6px;
    }
</style>
<body>
    <header class="container">
        <div class="sidebar">
            <div class="sidebar-header"><span>Simon - DerMetelGamerYT</span></div>
            <div>
            <div class="sidebar-body">
                <a class="active" href="/blog/">
                    <div><span>&#127968 Home</span></div>
                </a>
                
                <a href="posts">
                    <div><span>&#128196 Posts</span></div>
                </a>
                <div class="sidebar-header"><span>My Projects</span></div>
                <a href="https://github.com/MetelGamerYT/MetelPlus">      
                    <div><img src="https://raw.githubusercontent.com/MetelGamerYT/MetelPlus/main/settings/webmedia/metelplus_logo.png" height="24" width="24" alt=""><span>MetelPlus - Streaming</span></div>
                </a>
                
                <a href="https://github.com/MetelGamerYT/Single-Pages">
                <div><img src="https://github.githubassets.com/images/modules/logos_page/GitHub-Mark.png" alt="" height="24" width="24"><span>Single Pages</span></div>
                </a></div>
            </div>
        </div>
    </header>
</body>
</html>