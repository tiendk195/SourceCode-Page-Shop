<script>
  document.addEventListener("DOMContentLoaded", function () {
    var lazyImages = document.querySelectorAll("img[data-src]");
    
    lazyImages.forEach(function (img) {
      img.src = img.getAttribute("data-src");
      img.onload = function () {
        img.removeAttribute("data-src");
      };
    });
  });
</script>


    </div>
 
    <div id="x-teleport-target"></div>
    <script>
      window.addEventListener("DOMContentLoaded", () => Alpine.start()); 
    </script>
    


<?php
echo ReturnXss($system32['script']);
?>

  </body>
</html>