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



WHERE a.cat_id = :cat_id ORDER BY a.id LIMIT 3