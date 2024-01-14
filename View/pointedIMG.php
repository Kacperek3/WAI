<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Premier League</title>
    <link rel="stylesheet" href="../styles/styles.css">
    <link rel="stylesheet" href="../styles/stylesGalery.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body>
    <header class="header">
        <video src="../staticIMG/videoMainSite.mp4" autoplay loop muted disablepictureinpicture></video>
        <img id="logo_Premier_League" src="../staticIMG/Premier-League-4.png" alt="Logo Premier League">
    </header>
    <div class="menu">
        <nav class="top-menu">
            <div class="con">
                <div class="conMargin"><a href="main.html" id ="mainWebsite">Strona Główna</a></div>
                <div class="conMargin"><a href="#" id="galeryText">Galeria</a></div>
                <div class="conMargin"><a href="form.html" id="formText">Newsletter</a></div>
                <div class="conMargin">
                    <div class="submenu">
                        <a href="#" id="latestMatches">Najbliższe Mecze ▼</a>
                        <ul class="dropdown">
                            <li><a target="_blank" href="https://www.google.com/search?q=mecze+premier+league&oq=mecze+premier+lea&gs_lcrp=EgZjaHJvbWUqDQgAEAAYgwEYsQMYgAQyDQgAEAAYgwEYsQMYgAQyBggBEEUYOTIHCAIQABiABDIHCAMQABiABDIHCAQQABiABDIHCAUQABiABDIHCAYQABiABDIHCAcQABiABDIHCAgQABiABDIHCAkQABiABNIBCDQyNjVqMGo3qAIAsAIA&sourceid=chrome&ie=UTF-8#sie=m;/g/11svj12jd2;2;/m/02_tc;dt;fp;1;;;">12.11.2023</a></li>
                            <li><a target ="_blank" href="https://www.google.com/search?q=mecze+premier+league&oq=mecze+premier+lea&gs_lcrp=EgZjaHJvbWUqDQgAEAAYgwEYsQMYgAQyDQgAEAAYgwEYsQMYgAQyBggBEEUYOTIHCAIQABiABDIHCAMQABiABDIHCAQQABiABDIHCAUQABiABDIHCAYQABiABDIHCAcQABiABDIHCAgQABiABDIHCAkQABiABNIBCDQyNjVqMGo3qAIAsAIA&sourceid=chrome&ie=UTF-8#sie=m;/g/11svj14x72;2;/m/02_tc;dt;fp;1;;;">25.11.2023</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            
        </nav>
    </div>

    <div class="mid">
        <div id="third">
            
            
            <div id="headerThumbnails">
                <h1 id="introduceThumbnails">Zaznaczone zdjęcia</h1>
            </div>
            <div>
                <a href="galery.php">
                    <button type="button" id="unselectBigger">Strona główna</button>
                </a>
            </div>
            <div id="Thumbnails">
                <?php
                require('../model/pointedThumbnails.php');
                ?>
            </div>
        </div>
    </div>

        
    <footer class="footer">
        <div class="container">
            <div class="footer-col">
                <h4>Zaobserwuj mnie</h4>
                <div class="social-links">
                    <a href="https://www.facebook.com/premierleague"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://www.instagram.com/premierleague/"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            <div class="footer-col2">
                <a href="#">Początek strony</a>
            </div>
            <div class="footer-col3">
                
            </div>
        </div>
        <div id = "copyright">
            &copy; 2023 Premier League. Wszelkie prawa zastrzeżone.
        </div>
    </footer>
</body>
</html>
