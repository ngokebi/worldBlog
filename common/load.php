<?php
include "config.php";
?>
<!doctype html>
<html>
    <head>
        <title>Load more data using jQuery,AJAX, and PHP</title>
        <link href="style.css" type="text/css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        <script src="script.js"></script>
    </head>
    <body>
        <div class="container">

            <?php
            $rowperpage = 3;

            // counting total number of posts
            $allcount_query = "SELECT count(*) as allcount FROM posts";
            $allcount_result = mysqli_query($con,$allcount_query);
            $allcount_fetch = mysqli_fetch_array($allcount_result);
            $allcount = $allcount_fetch['allcount'];

            // select first 5 posts
            $query = "select * from posts order by id asc limit 0,$rowperpage ";
            $result = mysqli_query($con,$query);

            while($row = mysqli_fetch_array($result)){

                $id = $row['id'];
                $title = $row['title'];
                $content = $row['content'];
                $shortcontent = substr($content, 0, 160)."...";
                $link = $row['link'];
            ?>

                <div class="post" id="post_<?php echo $id; ?>">
                    <h2><?php echo $title; ?></h2>
                    <p>
                        <?php echo $shortcontent; ?>
                    </p>
                    <a href="'.$link.'" target="_blank" class="more">More</a>
                </div>

            <?php
            }
            ?>

            <h2 class="load-more">Load More</h2>
            <input type="hidden" id="row" value="0">
            <input type="hidden" id="all" value="<?php echo $allcount; ?>">

        </div>
    </body>
    <script>
    $(document).ready(function() {
        // Load more data
        $('.load-more').click(function() {
            var row = Number($('#row').val());
            var allcount = Number($('#all').val());
            var rowperpage = 3;
            row = row + rowperpage;

            if (row <= allcount) {
                $("#row").val(row);

                $.ajax({
                    url: 'getData.php',
                    type: 'post',
                    data: {
                        row: row
                    },
                    beforeSend: function() {
                        $(".load-more").text("Loading...");
                    },
                    success: function(response) {

                        // Setting little delay while displaying new content
                        setTimeout(function() {
                            // appending posts after last post with class="post"
                            $(".post:last").after(response).show().fadeIn("slow");

                            var rowno = row + rowperpage;

                            // checking row value is greater than allcount or not
                            if (rowno > allcount) {

                                // Change the text and background
                                $('.load-more').text("Hide");
                                $('.load-more').css("background", "darkorchid");
                            } else {
                                $(".load-more").text("Load more");
                            }
                        }, 2000);

                    }
                });
            } else {
                $('.load-more').text("Loading...");

                // Setting little delay while removing contents
                setTimeout(function() {

                    // When row is greater than allcount then remove all class='post' element after 3 element
                    $('.post:nth-child(3)').nextAll('.post').remove();

                    // Reset the value of row
                    $("#row").val(0);

                    // Change the text and background
                    $('.load-more').text("Load more");
                    $('.load-more').css("background", "#15a9ce");

                }, 2000);


            }

        });

    });
</script>
</html>