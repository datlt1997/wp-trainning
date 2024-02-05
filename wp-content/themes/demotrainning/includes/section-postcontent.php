<?php
if (have_posts()) {
    while (have_posts()) {
        the_post();
        ?>
        <h4 class="title">
            <?php the_title() ?>
        </h4>
        <?= get_the_date('d/m/Y h:m:s') ?>
        <p class="content">
            <?php the_content(); ?>
        </p>
        <p>Bài viết được tạo bởi <?= get_the_author_meta('first_name') ?><?= get_the_author_meta('last_name') ?></p>

<?php
    } // end while
    $tags = get_the_tags();
    foreach ($tags as $tag) {
        ?>
            <a class="badge bg-secondary" href="<?= get_tag_link($tag->term_id) ?>">
                <?= $tag->name ?>
            </a>
        <?php
    }
    // get categoríe
    $categories = get_the_category();
    foreach ($categories as $category) {
        ?>
            <a class="badge bg-danger" href="<?= get_category_link($category->term_id) ?>"><?= $category->name ?></a>
        <?php
    }
} // end if
