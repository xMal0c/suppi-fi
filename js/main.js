// Example starter JavaScript for disabling form submissions if there are invalid fields
(() => {
  "use strict";

  let riviMaara = 1;

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  const forms = document.querySelectorAll(".needs-validation");

  // Loop over them and prevent submission
  Array.from(forms).forEach((form) => {
    form.addEventListener(
      "submit",
      (event) => {
        if (!form.checkValidity()) {
          event.preventDefault();
          event.stopPropagation();
        }

        form.classList.add("was-validated");
      },
      false
    );
  });

  const asiakasHakuBtn = document.querySelector("#asiakasHaku");

  async function haeAsiakastiedot(hakusana) {
    const response = await fetch("asiakashaku.php?hakusana=" + hakusana)
    const data = await response.text()

    console.log(data)
    return data
  }

  if (asiakasHakuBtn != null) {
    asiakasHakuBtn.addEventListener("click", () => {
      const asiakasHakusana = document.querySelector("#hakusana")
      haeAsiakastiedot(asiakasHakusana.value).then((data) => {
        const asiakastiedot = document.querySelector("#asiakastiedot")
        asiakastiedot.innerHTML = data
      });
    });
  }

  const hakusana = document.querySelector("#hakusana");

  if (hakusana != null) {
    hakusana.addEventListener("keyup", (e) => {
      if (e.target.value.length > 2) {
        haeAsiakastiedot(e.target.value).then((data) => {
          document.querySelector("#asiakastiedot").innerHTML = data;
        });
      }
    });
  }

  const lisaaRiviBtn = document.querySelector("#lisaaRivi")
  if (lisaaRiviBtn != null) {
    lisaaRiviBtn.addEventListener("click", () => {
      const rivi = document.querySelector("#rivi-1")

      const uusiRivi = rivi.cloneNode(true)
      uusiRivi.id = "rivi-" + ++riviMaara
      rivi.after(uusiRivi)

      const tdElementit = uusiRivi.getElementsByTagName("td")
      const viimeinenTD = tdElementit[tdElementit.length - 1];

      const painike = viimeinenTD.getElementsByTagName("button")
      painike[0].classList.remove("piiloon")

      painike[0].addEventListener('click', (e)=> {
        const riviTR = e.target.parentNode.parentNode
        riviTR.remove()
        riviMaara--
      })
    })
  }
})()

if (window.location.pathname.endsWith("/lisaa_myyja.php")) {
  document
    .getElementById("show_password")
    .addEventListener("click", function () {
      var passwordInput = document.getElementById("salasana");
      if (this.checked) {
        passwordInput.type = "text";
      } else {
        passwordInput.type = "password";
      }
    });
}
/*
window.onscroll = function () {
  scrollFunction();
};

function scrollFunction() {
  var navbar = document.querySelector(".navbar");

  if (window.scrollY > 50) {
    navbar.classList.add("navbar-scale", "smaller-navbar");
  } else {
    navbar.classList.remove("smaller-navbar");
  }
}
*/
