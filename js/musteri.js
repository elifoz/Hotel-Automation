function tckimlik(tcno) {
    if (tcno == "") {
        document.getElementById("tckimlikbilgisi").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("tckimlikbilgisi").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","musterigetir.php?q="+tcno,true);
        xmlhttp.send();
    }
}

function firmagetir(firma) {
    if (firma== "") {
        document.getElementById("firmayigetir").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("firmayigetir").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","firmayigetir.php?f="+firma,true);
        xmlhttp.send();
    }
}

function firmagoruntule(firma) {
    if (firma== "") {
        document.getElementById("firmayigetir").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("firmayigetir").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","firmayigetir.php?fg="+firma,true);
        xmlhttp.send();
    }
}

function faturaekle(fatura) {
    if (fatura== "") {
        document.getElementById("faturayiekle").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("faturayiekle").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","firmayigetir.php?fe="+fatura,true);
        xmlhttp.send();
    }
}

