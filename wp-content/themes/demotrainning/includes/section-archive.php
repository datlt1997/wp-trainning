<?php

global $wpdb;
$query = "SELECT * FROM {$wpdb->prefix}posts WHERE post_type = 'post' AND post_status = 'publish'";
$results = $wpdb->get_results($query);

foreach ($results as $post) {
    echo $post->post_title;
    echo $post->post_content;
}

//if (have_posts()) {
//    while (have_posts()) {
//        the_post();
//        //
//        ?>
<!--        <!-- trong đây mới được code html -->-->
<!--        <!-- shif + Home => chọn dòng mà mình muốn comment => Ctrl + ? để comment -->-->
<!--        <div class="card">-->
<!--            <!-- <img class="card-img-top" src="holder.js/100x180/" alt=""> -->-->
<!--            <div class="card-body">-->
<!--                <h4 class="card-title">-->
<!--                    --><?php //the_title(); ?>
<!--                </h4>-->
<!--                <p class="card-text">-->
<!--                    --><?php //the_excerpt(); ?>
<!--                </p>-->
<!--            </div>-->
<!--            <div class="card-footer">-->
<!--                <a class="btn btn-outline-success" href="--><?php //the_permalink(); ?><!--">Xem thêm</a>-->
<!--            </div>-->
<!--        </div>-->
<!---->
<!--        --><?php
//
//
//
//        //
//    } // end while
//
//    // pagination
//
//
//
//} // end if
//
//echo paginate_links();