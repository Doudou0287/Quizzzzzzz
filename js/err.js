document.getElementById("register").addEventListener("click", function(event) {
    var erreur;
    var inputs = document.forms["registeration"];
    var regex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;


    var email = inputs["email"];
    //var msg = inputs["textarea"];

    if ((email.value.match(regex) == null)) {
        email.classList.add("invalid");
        erreur = "email invalide"
    }
    email.addEventListener('input', function() {
        if ((email.value.match(regex) == null)) {
            email.classList.add("invalid");
            erreur = "email invalide"
        } else {
            email.classList.remove("invalid");
            erreur = ""
        }
    })

    if (erreur) {
        event.preventDefault();
        document.getElementById("erreur1").innerHTML = erreur;
        return false;
    }

});