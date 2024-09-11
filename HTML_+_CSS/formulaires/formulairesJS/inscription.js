function nomVides() {
  const nom = document.querySelector(".nom");

  const email = document.querySelector(".email");

  const mdp = document.querySelector(".mdp");

  const verificationMdp = document.querySelector(".verificationMdp");

  // regex de l'email
  const emailValid = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

  if (!emailValid.test(email.value)) {
    alert("l'email n'est pas valide");
    return false;
  }

  if (nom.value === "") {
    alert("vous devez rentrer un nom");
    return false;
  }

  if (mdp.value === "" || verificationMdp.value === "") {
    alert("vous devez rentrer un mot de passe valide");
    return false;
  } else if (mdp.value !== verificationMdp.value) {
    alert("les deux mots de passe ne sont pas identiques");
    return false;
  }

  return true;
}
