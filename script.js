
const container = document.querySelector('.container');

container.addEventListener('click', (event) => {
   if (event.target.classList.contains('btnLogout-popup')) {
      window.location.href = "includes/logout.inc.php";
   }

   if (event.target.classList.contains('btnLogin-popup')) {
    window.location.href = "login.php";
}
});