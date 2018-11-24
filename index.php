<?php
    require_once "links/links.php";
    require_once "layout/header.php";
    require_once "books/Books.php";
?>
    <!--BOOKS-->
<?php $books = new Books();
      $bok = $books->seeBook()?>
    <h2>Books</h2>
    <div class="books">
        <?php
            while ($book = $bok->fetch_assoc()) {
                echo "<div class='book'>
                             <a href='#'><img src=\"img/{$book['isbn']}.jpg\" alt=\"books\" width='220px' height='278.99px'/></a>
                        </div>";
            }
        ?>
    </div>
<?php
    require_once "layout/footer.php";
?>
