document.addEventListener("DOMContentLoaded", function () {

    var label = document.createElement('label');
    label.setAttribute('for', 'jezyk');
    label.setAttribute('id', 'jezykLabel');
    label.textContent = 'Język: ';

    var select = document.createElement('select');
    select.setAttribute('id', 'jezyk');
    select.setAttribute('name', 'jezyk');

    var option1 = document.createElement('option');
    option1.setAttribute('value', 'Polski');
    option1.setAttribute('id', 'polish');
    option1.textContent = 'Polski';

    var option2 = document.createElement('option');
    option2.setAttribute('value', 'Angielski');
    option2.setAttribute('id', 'english');
    option2.textContent = 'Angielski';

    select.appendChild(option1);
    select.appendChild(option2);

    var container = document.querySelector('.footer-col3');

    container.appendChild(label);
    container.appendChild(select);

    var select = document.getElementById("jezyk");
    select.addEventListener("change", changeLanguage);

    var selectedLanguage = localStorage.getItem("selectedLanguage");
    if (selectedLanguage) {
        select.value = selectedLanguage;
        changeLanguage();
    }

    function changeLanguage() {
        var footerCol2 = document.querySelector(".footer-col2 a");

        var tableH1 = document.querySelector(".middle .table h1");

        var aboutLeagueh1 = document.querySelector(".aboutLeague h1");
        var aboutLeaguep = document.querySelector(".aboutLeague p");

        var abouthobbyh1 = document.querySelector(".aboutHobby h1");
        var abouthobbyp = document.querySelector(".aboutHobby p");

        var socialLinks = document.querySelector(".footer-col h4");
        var copyright = document.querySelector("#copyright");
        var chooseLanguage = document.querySelector("#jezykLabel");
        var Polish = document.querySelector("#polish");
        var English = document.querySelector("#english");

        var TeamName = document.querySelector("#TeamName");
        var Points = document.querySelector("#Points");
        var Goals = document.querySelector("#Goals");
        var Lost = document.querySelector("#Lost");

        var introduce = document.querySelector("#galleryPhoto");

        var name = document.querySelector("#imieLabel");
        var nazwisko = document.querySelector("#nazwiskoLabel");
        var miasto = document.querySelector("#miastoLabel");
        var name = document.querySelector("#imieLabel");
        var mezczyzna = document.querySelector("#mezczyznaLabel");
        var women = document.querySelector("#kobietaLabel");
        var education = document.querySelector("#wyksztalcenieLabel");
        var podstawowe = document.querySelector("#podstawowe");
        var srednie = document.querySelector("#srednie");
        var wyzsze = document.querySelector("#wyzsze");
        var uwagi = document.querySelector("#uwagiLabel");
        var wyczysc = document.querySelector('.containerForm input[type="reset"]');
        var wyslij = document.querySelector('.containerForm input[type="submit"]');
        var intro = document.querySelector("#introduce h1");

        var mainPage = document.querySelector("#mainWebsite");
        var gallery = document.querySelector("#galeryText");
        var latestMatches = document.querySelector("#latestMatches");



        selectedLanguage = select.value;
        localStorage.setItem("selectedLanguage", selectedLanguage);

        if (selectedLanguage === "Angielski") {
            footerCol2.textContent = "Top of page";
            try{
                tableH1.textContent = "League Table";

                aboutLeagueh1.textContent = "About League";
                var text = 'The Premier League is the highest-ranking mens league football competition in England, also serving as the top tier of the football league system. It was established on February 20, 1992, and has been managed by the FA Premier League since then. The competitions take place cyclically every season, from August to May, using a round-robin system and involve the top 20 English and Welsh football clubs. The winner is crowned the champion of England, while the weakest teams are relegated to the EFL Championship.The league was founded on February 20, 1992, as the FA Premier League when the clubs from the Football League First Division decided to become independent of The Football League and the Football Association. Since then, the Premier League has been the most-watched sports league in the world and also the most lucrative football competition. In the 2007/2008 season, the clubs generated a turnover of £1.93 billion (approximately $3.15 billion). Since its inception, a total of 51 teams have participated in the <a href="https://www.premierleague.com/">Premier League</a>.';
                aboutLeaguep.innerHTML = text;
    
                abouthobbyh1.textContent = "Why football league is my hobby?";
                abouthobbyp.textContent = "As a 5-year-old, I began my journey with football. I spent countless hours on the field, learning the techniques, honing my skills, and understanding the rules of the game. This love for football has been with me since the earliest years, and it's the reason I'm now an avid fan of the Premier League. It's a league where many outstanding teams compete, and every match is filled with emotions, passion, and unforgettable moments. Creating this website about the Premier League is not just a project task for me; it's also a way to express my passion and pay tribute to this wonderful sport. I want to share information, results, and the history of this league with others."
                
                TeamName.textContent = "Team name";
                Points.textContent = "Points";
                Goals.textContent = "Goals Scored";
                Lost.textContent = "Lost Goals";
            }catch{

            }
            try{
                introduce.textContent = "Gallery";
            }catch{

            }
            try{
                intro.textContent = "Sign up for newsletter";
                name.textContent = "Name:";
                nazwisko.textContent = "Surname:";
                miasto.textContent = "City:";
                mezczyzna.textContent = "Men";
                women.textContent = "Women";
                education.textContent = "Education:";
                podstawowe.textContent = "Primary";
                srednie.textContent = "Secondary";
                wyzsze.textContent = "Higher";
                uwagi.textContent = "Feedback";
                wyczysc.value = "Clear";
                wyslij.value = "Submit";
            }catch{

            }
            English.textContent = "English";
            Polish.textContent = "Polish";

            mainPage.textContent = "Main Page";
            gallery.textContent = "Gallery";
            latestMatches.textContent = "Latest Matches";

            socialLinks.textContent = "Follow me";
            copyright.textContent = "© 2023 Premier League. All rights reserved.";
            chooseLanguage.textContent = "Language:";

        } 
        else {
            try{
                tableH1.textContent = "Aktualna Tabela Ligi";
                aboutLeagueh1.textContent = "O Premier League";

                var text = 'Premier League – najwyższa w hierarchii klasa męskich ligowych rozgrywek piłkarskich w Anglii, będąca jednocześnie najwyższym szczeblem centralnym (I poziom ligowy), utworzona 20 lutego 1992 i od tego momentu zarządzana przez FA Premier League. Zmagania w jej ramach toczą się cyklicznie (co sezon od sierpnia do maja), systemem kołowym i przeznaczone są dla 20 najlepszych angielskich i walijskich klubów piłkarskich. Ich triumfator zostaje mistrzem Anglii, zaś najsłabsze drużyny są relegowane do EFL Championship. Liga została założona 20 lutego 1992 jako FA Premier League, gdy kluby Football League First Division zdecydowały się uniezależnić od The Football League i Football Association. Od tego czasu Premier League jest najchętniej oglądaną ligą sportową na świecie[1]. Są to także najbardziej dochodowe rozgrywki piłkarskie. W sezonie 2007/2008 obroty klubów wyniosły 1,93 miliardów funtów (3,15 miliardów dolarów)[2]. Od czasu założenia w rozgrywkach <a href="https://www.premierleague.com/">Premier League</a> brało udział 51 drużyn.';
                aboutLeaguep.innerHTML = text;

                abouthobbyh1.textContent = "Dlaczego Liga piłkarska moim hobby?"
                abouthobbyp.textContent = "Już jako 5-latek rozpocząłem swoją przygodę z piłką nożną. Spędziłem mnóstwo godzin na boisku, ucząc się techniki, rozwijając umiejętności i poznając zasady gry. Ta miłość do piłki nożnej towarzyszy mi od najmłodszych lat, i to właśnie dzięki niej jestem teraz aktywnym fanem Premier League. To liga, w której rywalizuje wiele znakomitych drużyn, a każdy mecz to emocje, pasja i niezapomniane chwile. Tworzenie tej strony internetowej o Premier League to dla mnie nie tylko zadanie projektowe, ale także sposób na wyrażenie mojej pasji i oddanie hołdu temu wspaniałemu sportowi. Chcę dzielić się informacjami, wynikami i historią tej ligi z innymi osobami."
            
                TeamName.textContent = "Nazwa drużyny";
                Points.textContent = "Punktacja";
                Goals.textContent = "Bramki strzelone";
                Lost.textContent = "Bramki stracone";
            }catch{

            }

            try{
                introduce.textContent = "Galeria zdjęć";
            }catch{

            }
            try{
                name.textContent = "Imię:";
                nazwisko.textContent = "Nazwisko:";
                miasto.textContent = "Miasto:";
                mezczyzna.textContent = "Mężczyzna:";
                women.textContent = "Kobieta";
                education.textContent = "Wykształcenie:";
                podstawowe.textContent = "Podstawowe";
                srednie.textContent = "Średnie";
                wyzsze.textContent = "Wyższe";
                uwagi.textContent = "Uwagi";
                wyczysc.value = "Wyczyść";
                wyslij.value = "Wyślij";
                intro.textContent = "Zapisz się do newslletera";
            }catch{

            }
            Polish.textContent = "Polski";
            English.textContent = "Angielski";

            mainPage.textContent = "Strona Główna";
            gallery.textContent = "Galeria";
            latestMatches.textContent = "Najbliższe mecze";


            footerCol2.textContent = "Początek strony";
                        
            socialLinks.textContent = "Zaobserwuj mnie";
            copyright.textContent = "© 2023 Premier League. Wszelkie prawa zastrzeżone.";
            chooseLanguage.textContent = "Język:"
        }   
    }
});
