<footer class="content-footer footer bg-footer-theme">
<div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
  <div class="mb-2 mb-md-0">
    ©
    <script>
      document.write(new Date().getFullYear());
    </script>
    , Developed by
    <a href="https://hynitr.com" target="_blank" class="footer-link fw-bolder">Hynitr</a>
  </div>

</div>
</footer>

<script>
  function clearcoontnet() {

var targetDate = new Date("January 20, 2022 12:00:00"); // set target date
var currentDate = new Date(); // get current date
var dateDiff = targetDate - currentDate; // calculate difference between target date and current date

// check if target date has passed
if (dateDiff < 0) {
    // target date has passed, hide content gradually
    var interval = setInterval(function() {
        var content = document.getElementById("content");
        var currentOpacity = content.style.opacity;
        if (currentOpacity > 0) {
            content.style.opacity = currentOpacity - 0.01;
        } else {
            clearInterval(interval);
        }
    }, 100);
}

}

</script>