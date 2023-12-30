$(document).ready(function () {
    $(".finalsButtons").eq(1).click(function () {
        selectedLanguage = $("#jezyk").val();
        if ($("#imie").val() === "" || $("#nazwisko").val() === "" || $("#email").val() === "" || $("#miasto").val() === "") {
            if(selectedLanguage ==="Angielski"){
                $("#dialogENG").dialog("open");
                return false;
            }
            else{
                $("#dialogPL").dialog("open");
                return false;
            }
        }
    });

    $("#dialogENG").dialog({
        autoOpen: false,
        modal: true,
        buttons: {
            "OK": function () {
                $(this).dialog("close");
            }
        }
    });
    $("#dialogPL").dialog({
        autoOpen: false,
        modal: true,
        buttons: {
            "OK": function () {
                $(this).dialog("close");
            }
        }
    });

    var availableCities = [
        "Warszawa", "Kraków", "Łódź", "Wrocław", "Poznań", "Gdańsk", 
        "Szczecin", "Bydgoszcz", "Lublin", "Białystok", "Katowice", 
        "Gdynia", "Częstochowa", "Radom", "Sosnowiec", "Toruń", 
        "Kielce", "Rzeszów", "Gliwice", "Zabrze", "Olsztyn", 
        "Bielsko-Biała", "Bytom", "Zielona Góra", "Rybnik", "Opole", 
        "Tychy", "Dąbrowa Górnicza", "Płock", "Elbląg", "Gorzów Wielkopolski", 
        "Włocławek", "Chorzów", "Tarnów", "Koszalin", "Kalisz", 
        "Legnica", "Grudziądz", "Jaworzno", "Słupsk", "Jastrzębie-Zdrój", 
        "Nowy Sącz", "Jelenia Góra", "Konin", "Piotrków Trybunalski", 
        "Siedlce", "Lubin"
    ];
    
    $("#miasto").autocomplete({
        source: function (request, response) {
            var term = request.term.toLowerCase();
            var length = term.length;
            var matches = [];
            for (var i = 0; i < availableCities.length; i++) {
                if (availableCities[i].toLowerCase().slice(0, length) === term) {
                    matches.push(availableCities[i]);
                }
            }
            response(matches);
        }
    });
    
    

});