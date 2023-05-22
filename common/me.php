<ul class="nav nav-tabs">
    <?php
    $qu = "sql query for generating all tabs with some condition";
    $rr = mysqli_query($conn, $qu);
    $num = 0;
    while ($tab1 = mysqli_fetch_array($rr)) {
    ?>
        <li <?php if ($num == 0) { ?> class="active" <?php } else { ?> class="" <?php } ?>><a data-toggle="tab" href="#<?php echo $tab1['field_name']; ?>"><?php echo $tab1['field_name']; ?></a></li>

    <?php
        $num++;
    } ?>

</ul>

<div class="tab-content">
    <?php
    $qu = "sql query for generating all tabs with some condition"; //again i run same query of above
    $rr = mysqli_query($conn, $qu);
    $num = 0;
    while ($tab1 = mysqli_fetch_array($rr)) {

    ?>
        <div id="<?php echo $tab1['field_name']; ?>" <?php if ($num == 0) { ?> class="tab-pane fade in active" <?php } else { ?> class="tab-pane fade in" <?php } ?>>
            <table>
                <thead>
                    <tr> all rows </tr>
                </thead>
                <?php
                $qu1 = "sql query for generating result";
                $resout = mysqli_query($conn, $qu1);
                if (mysqli_num_rows($resout) > 0) {
                    while ($row2 = mysqli_fetch_array($resout)) {
                ?>
                        <tbody>
                            <tr>
                                <td><?php echo $row2['field_name']; ?></td>
                            </tr>
                        </tbody>
                <?php
                    }
                } else {
                    echo 'No result Found';
                }
                ?>
            </table>

        </div>

    <?php
        $num++;
    } ?> <!-- End of the While Loop -->
</div>
</div>
<?php


#current blog post

$blog_id = 5;
$b_query=$conn->prepare("SELECT * FROM blogs WHERE blog_id=:id AND blog_status=:status");
$b_query->execute(array(
    'id' => $blog_id,
    'status' => 1
));
$b_query_get=$b_query->fetch(PDO::FETCH_ASSOC);

/* We check the existence of such data from the database. */
$single_post_control=$b_query->rowCount();
if($single_post_control == 0   ){
    echo "error";
    exit;
}

/* next post - previous post*/
$b_pre_nex=$conn->prepare("SELECT * FROM blogs WHERE   blog_id = (SELECT MIN(blog_id)  FROM blogs WHERE blog_id > :pre_nex_id AND blog_status=:pre_nex_status )  OR blog_id = (SELECT MAX(blog_id) FROM blogs WHERE blog_id < :pre_nex_id AND blog_status=:pre_nex_status) ");
$b_pre_nex->execute(array(
    'pre_nex_id' => $blog_id_get,
    'pre_nex_status' => 1
));

$control=$b_pre_nex->rowCount();
if($control == 0 || $control  > 3  ){
    echo "error";
    exit;
}

/* Here, we are splitting our previous and next posts separately.*/
$prev_post = $b_pre_nex->fetch(PDO::FETCH_ASSOC);
$next_post = NULL;
while ( $rows = $b_pre_nex->fetch(PDO::FETCH_ASSOC) ) {
    $next_post = $rows;
}
if(!isset($next_post)) {
    $next_post = null;
}


echo '<a href="#" style="float:left">'.$prev_post['blog_name'].'</a>';

echo '<a href="#" style="float:right">'.$next_post['blog_name'].'</a>';


