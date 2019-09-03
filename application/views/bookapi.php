

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<html>

    <body>

        <div id="form">
            <form method="POST">
                Enter ISBN: <input type="text" size="40" placeholder="ISBN" value="9780415261876" name="isbn" id="isbn" />
                <button onclick="javascript:search_google_books();
                        return false;">Search</button>

            </form>

        </div>

        Title: <h3 class="title"></h3>
        Author: <h3 class="author"></h3>
        publishers: <h3 class="publishers"></h3>
<div id="thumbnail"></div>

    </body>

</html>

<script>
    function search_google_books() {
        var isbn = $('#isbn').val();
        
        alert(isbn);
        
if (isbn && isbn.value != '') {
    document.getElementById('thumbnail').innerHTML = '<img src="http://covers.openlibrary.org/b/isbn/' + isbn + '-M.jpg" />';
        $.ajax({
            url: "https://openlibrary.org/api/books?bibkeys=ISBN:" + isbn + "&jscmd=details&callback=mycallback",
            dataType: "jsonp",
            success: handleResponse
        });
        function handleResponse(response) {
            //    alert(JSON.stringify(response));
            var isbnObj = 'ISBN:' + isbn;
            var detail = response[isbnObj];



            var title = detail.details.title,
                    author = detail.details.authors[0].name,
                    publishers = detail.details.publishers;
            $('.title').text(title);
            $('.author').text(author);
            $('.publishers').text(publishers);
        }


    }
      else {
    alert('Please input ISBN!');
  }
  }

</script>


