if (localStorage.getItem("theme") != null) {
    if (localStorage.getItem("theme") == "dark")
        document.querySelector(".theme").href = "/darkvar.css"
}

let themeSwapper = document.querySelector(".theme-swapper")

themeSwapper.addEventListener("click", () => {
    if (localStorage.getItem("theme") != null) {
        if (localStorage.getItem("theme") == "dark")
            localStorage.setItem("theme", "light")
        else localStorage.setItem("theme", "dark")
    }
    else
        localStorage.setItem("theme", "dark")
    window.location.reload()
}
)

function confirmer(id) {
    if (confirm("Voulez-vous vraiment supprimer ce client ?")) {
        window.location.href = "delete.php?id=" + id;
    }
}

function confirmermodifclient(id) {
    if (confirm("Voulez-vous vraiment modifier ce client ?")) {
        let username = document.getElementById('username').value;
        let email = document.getElementById('email-change').value;
        window.location.href = "modif.php?id=" + id + "&username=" + username + "&email=" + email;
    }
}
function confirmerdelentr(id) {
    if (confirm("Voulez-vous vraiment supprimer cette entreprise ?")) {
        window.location.href = "deleteentreprise.php?id=" + id;
    }
}

function confirmermodifentr(id) {
    if (confirm("Voulez-vous vraiment modifier cette entreprise ?")) {
        let name = document.getElementById('name').value;
        let isactive = document.getElementById('isactive').value;
        window.location.href = "modifentreprise.php?id=" + id + "&name=" + name + "&isactive=" + isactive;
    }
}


function confirmerdelprod(id) {
    if (confirm("Voulez-vous vraiment supprimer cette entreprise ?")) {
        window.location.href = "deleteproduits.php?id=" + id;
    }
}


function confirmermodifprod(id) {
    if (confirm("Voulez-vous vraiment modifier ce produit ?")) {
        let name = document.getElementById('name').value;
        let price = document.getElementById('price').value;
        let description = document.getElementById('description').value;
        window.location.href = "modifproduits.php?id=" + id + "&name=" + name + "&price=" + price + "&description=" + description;
    }
}

let supprArticle = document.querySelectorAll(".suppr-article")

supprArticle.forEach(supprArticle => {
    console.log(supprArticle.dataset.id)
    supprArticle.addEventListener("click", () => {
        window.location.href = "deletearticlepanier.php?id=" + supprArticle.dataset.id;
    })
});