<?php get_header();?>
<!-- Sida för undersida -->
<main>
    <section>
        <div class="container">
            <div class="row">
                <div id="primary" class="col-xs-12 col-md-9">
                    <h1><?php the_title();?></h1>
                    <?php 
                    if (have_posts()){
                        while(have_posts()){
                            the_post();
                            the_content();
                        } 
                    } 
                    ?>
                </div>
                
            </div>
        </div>
    </section>
</main>


<?php get_footer();?>