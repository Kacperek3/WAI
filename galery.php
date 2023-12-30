<?php
// Początek pliku PHP
session_start(); // Rozpocznij sesję
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Premier League</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="stylesGalery.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <script src="language.js"></script>
</head>
<body>
    <header class="header">
        <video src="videoMainSite.mp4" autoplay loop muted disablepictureinpicture></video>
        <img id="logo_Premier_League" src="Premier-League-4.png" alt="Logo Premier League">
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
        <div class="first">
            <div id = "svg">
                <svg width="200" height="200">
                    <image x="0" y="0" width="200" height="200" xlink:href="logo.svg" />
                </svg>
            </div>
            <div id = "introduce">
                <h1 id="galleryPhoto">Galeria Zdjęć</h1>
            </div>
        </div>

        <div class ="upload">
            <form action="sendingToServer.php" class = "forms" method="post" enctype="multipart/form-data">
                <div id="fileLabelDiv">
                    <label for="file" id="fileLabel">Prześlij swoje zdjęcie:</label>
                </div>
                <div id="backgroundColor">
                    <div id="row">
                        <div id="uploadFileDiv">
                            <input type="file" id="uploadFile" name="file" required>
                        </div>
                        <div id="watermarkDiv">
                            <label for="watermark" id ="waterMarkLabel">Znak wodny:</label>
                            <input type="text" id="watermark" name="watermark" required>
                        </div>
                    </div>
                    <div id="nrow">
                        <div id="authorDiv">
                            <label for="author" id ="authorLabel">Autor:</label>
                            <input type="text" id="author" name="author" required>
                        </div>
                        <div id="titleDiv">
                            <label for="title" id ="titleLabel">Tytuł:</label>
                            <input type="text" id="title" name="title" required>
                        </div>
                    </div>
                    <div id="submit">
                        <button type="submit" id="submitButton" name="submit">WYŚLIJ</button>
                    </div>
                </div>
                
            </form>
        </div>
        
        <div class="second">
            <div class="column">
                <div class="single">
                    <img src="photo1.jpg" alt="zdjęcie 1" class="photo">
                </div>
                <div class="single">
                    <img src="photo2.jpg" alt="zdjęcie 2" class="photo">
                </div>
                <div class="single">
                    <img src="photo3.jpg" alt="zdjęcie 3" class="photo">
                </div>
                <div class="single">
                    <img src="photo13.jpg" alt="zdjęcie 3" class="photo">
                </div>
            </div>
            <div class="column">
                <div class="single">
                    <img src="photo4.jpg" alt="zdjęcie 4" class="photo">
                </div>
                <div class="single">
                    <img src="photo5.jpg" alt="zdjęcie 5" class="photo">
                </div>
                <div class="single">
                    <img src="photo6.jpg" alt="zdjęcie 6" class="photo">
                </div>
                <div class="single">
                    <img src="photo14.jpg" alt="zdjęcie 3" class="photo">
                </div>
            </div>
            <div class="column">
                <div class="single">
                    <img src="photo7.jpg" alt="zdjęcie 7" class="photo">
                </div>
                <div class="single">
                    <img src="photo8.jpg" alt="zdjęcie 8" class="photo">
                </div>
                <div class="single">
                    <img src="photo9.jpg" alt="zdjęcie 9" class="photo">
                </div>
                <div class="single">
                    <img src="photo15.jpg" alt="zdjęcie 3" class="photo">
                </div>
            </div>
            <div class="column">
                <div class="single">
                    <img src="photo10.jpg" alt="zdjęcie 10" class="photo">
                </div>
                <div class="single">
                    <img src="photo11.jpg" alt="zdjęcie 11" class="photo">
                </div>
                <div class="single">
                    <img src="photo12.jpg" alt="zdjęcie 12" class="photo">
                </div>
                <div class="single">
                    <img src="photo16.jpg" alt="zdjęcie 3" class="photo">
                </div>
            </div>
        </div>


        <div id="third">
            <div id="rowLogin">
                <?php
                    if (isset($_SESSION['nazwa_uzytkownika'])) {
                        echo '<a href="logout.php"><button type="button">Wyloguj</button></a>';
                    } else {
                        echo '<a href="register.html"><button type="button">Zarejestruj</button></a>';
                        echo '<a href="login.html"><button type="button">Zaloguj</button></a>';
                    }
                ?>
            </div>
            
            <div id="headerThumbnails">
                <h1 id="introduceThumbnails">Przesłane zdjęcia</h1>
            </div>
            <div id="Thumbnails">
                <?php
                require('thumbnails.php');
                ?>
            </div>
            <?php
                include('pagination.php')
            ?>
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
