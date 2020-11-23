<html>
    <body>
        <h1>Enter a new website to see the links and images</h1>
        Website: <input type="text" id="websiteText" value="http://www.wikipedia.de">
        <br>
        <button id="submitButton" onclick="getImagesAndLinks(this.value)">submit</button>
        <br>
        <span id="responseHtml"></span>
    </body>
</html>
<script>
function getImagesAndLinks(str) {
  let url = document.getElementById("websiteText").value;
  let xhttp;
  if (url.length == 0) {
    document.getElementById("responseHtml").innerHTML = "";
    return;
  }
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("responseHtml").innerHTML = '';
      let parsedText;
      if (this.responseText !== '') {
      let parsedResponse = JSON.parse(this.responseText);
        parsedResponse.links.forEach(element => {
          document.getElementById("responseHtml").innerHTML += '<a href="' + element.href + '">' + element.text + '</a>';
          document.getElementById("responseHtml").innerHTML += '<br>';
        });
        parsedResponse.images.forEach(element => {
          document.getElementById("responseHtml").innerHTML += '<img src="' + element.src + '" alt="' + element.altText + '">';
          document.getElementById("responseHtml").innerHTML += '<br>';
        });
      }
    }
  };
  xhttp.open("GET", "api.php?website=" + url, true);
  xhttp.send();
}
</script>