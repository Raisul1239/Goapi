
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<form>
  <strong>Enter ISBN:</strong> <input type="text" id="ISBN" value="9781407170671">
  <input type="submit" id="submit">
</form>
Title: <span id="title"></span>
<br> Author: <span id="author"></span>
<br> Publication date: <span id="publishedDate"></span>

<script>
$("form").submit(
  function(e) {
    e.preventDefault();
    var isbn = $('#ISBN').val();
    var isbn_without_hyphens = isbn.replace(/-/g, "");
    var googleAPI = "https://www.googleapis.com/books/v1/volumes?q=" + isbn_without_hyphens;
    $.getJSON(googleAPI, function(response) {
      if (typeof response.items === "undefined") {
        alert("No books match that ISBN.")
      } else {
        $("#title").html(response.items[0].volumeInfo.title);
        $("#author").html(response.items[0].volumeInfo.authors[0]);
        $("#publishedDate").html(response.items[0].volumeInfo.publishedDate);
      }
    });
  }
);
</script>