function validateForm() {
    const nom = document.getElementById("nom");
    const cin = document.getElementById("cin");
    const telephone = document.getElementById("telephone");
    const email = document.getElementById("email");
    const password = document.getElementById("password");
    const c_password = document.getElementById("c_password");
    const ville = document.getElementById("ville");
    const adresse = document.getElementById("adresse");
    const nomBanque = document.getElementById("nomBanque");
    const numero_compte = document.getElementById("numero_compte");
    const role = document.getElementById("role");

    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    nom.classList.remove("is-valid");
    cin.classList.remove("is-valid");
    telephone.classList.remove("is-valid");
    email.classList.remove("is-valid");
    password.classList.remove("is-valid");
    c_password.classList.remove("is-valid");
    ville.classList.remove("is-valid");
    adresse.classList.remove("is-valid");
    nomBanque.classList.remove("is-valid");
    numero_compte.classList.remove("is-valid");
    role.classList.remove("is-valid");

    let isValid = true;

    if (nom.value.trim() === "") {
        nom.classList.add("is-valid");
        isValid = false;
    }

    if (cin.value.trim() === "" || isNaN(cin)) {
        cin.classList.add("is-valid");
        isValid = false;
    }

    if (telephone.value.trim() === "") {
        telephone.classList.add("is-valid");
        isValid = false;
    } else if (
        !/^\d{10}$/.test(telephone.value.trim()) &&
        !(
            telephone.value.trim().startsWith("+212") &&
            /^\+212\d{9}$/.test(telephone.value.trim())
        )
    ) {
        telephone.classList.add("is-valid");
        isValid = false;
    }

    if (email.value.trim() === "" || !emailRegex.test(email.value.trim())) {
        email.classList.add("is-valid");
        isValid = false;
    }

    if (password.value === "") {
        password.classList.add("is-valid");
        isValid = false;
    }

    if (c_password.value === "") {
        c_password.classList.add("is-valid");
        isValid = false;
    } else if (password.value !== c_password.value) {
        password.classList.add("is-valid");
        c_password.classList.add("is-valid");
        isValid = false;
    }

    if (ville.value.trim() === "") {
        ville.classList.add("is-valid");
        isValid = false;
    }

    if (adresse.value.trim() === "") {
        adresse.classList.add("is-valid");
        isValid = false;
    }

    if (nomBanque.value.trim() === "") {
        nomBanque.classList.add("is-valid");
        isValid = false;
    }

    if (
        numero_compte.value.trim() === "" ||
        isNaN(numero_compte.value.trim())
    ) {
        numero_compte.classList.add("is-valid");
        isValid = false;
    }

    if (role.value.trim() === "") {
        role.classList.add("is-valid");
        isValid = false;
    }

    return isValid;
}
