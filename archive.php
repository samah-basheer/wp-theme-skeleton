<?php
/**
 * Template part archive page
 */
get_header();
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <?php if(have_posts()): ?>
            <header class="archive-page-header">
                <?php
                    the_archive_title('<h1 class="archive-title">', '</h1>');
                    the_archive_description('<div class="archive-description">', '</div>');
                ?>
            </header>
        <?php
            while (have_posts()):
                the_post();
                get_template_part('template-parts/post/content');
            endwhile;

            echo paginate_links(array(
                    'prev_text' => 'Previous',
                    'next_text' => 'Next'
            ));

            else:
                get_template_part('template-parts/page/content', 'none');
            ?>
        <?php endif; ?>
    </main>
</div>

<?php
get_footer();
?>
