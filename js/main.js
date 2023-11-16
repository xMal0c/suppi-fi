// Example starter JavaScript for disabling form submissions if there are invalid fields
(() => {
  "use strict";

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
})();

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
