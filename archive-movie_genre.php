

<?php get_header();  ?>

<div id="wrap">
    <main>



        <section class="break">
            <div class="container-fluid">
                <div class="row">
                    <div class="col text-center grey">
                        <h2>APA APA</h2>
                    </div>
                </div>
            </div>
        </section>
        <section id="cards">
            <div class="container">
                <div class="row ">

                    <?php 
                        $args = array( 'post_type' => 'movies', 'posts_per_page' => 10, );
                        $the_query = new WP_Query( $args ); 
                    ?>
                    <?php if ( $the_query->have_posts() ){
                        while ( $the_query->have_posts() ){
                            $the_query->the_post(); ?>

                    <div class="col-sm-4" class="card" style="width: 18rem;">
                        <img src="<?php the_post_thumbnail_url() ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?php the_title(); ?></h5>
                            <p class="card-text"><?php the_excerpt(); ?></p>
                            <p> <?php 
                                the_terms($post->ID, 'movie_genre', 'Genre:',' / ' );

                             ?> </p>
                            <p> <?php 
                                the_terms($post->ID, 'movie_production', 'Produktionsbolat:',' / ' );

                             ?> </p>
                            <p> <?php 
                                the_terms($post->ID, 'movie_age', 'Åldersgräns:',' / ' );

                             ?> </p>
                            <a href="<?php the_permalink(); ?>" class="btn btn-primary">Läs mer</a>
                            <?php wp_reset_postdata(); ?>
                        </div>
                    </div>



                    <?php }
                    } ?>

        </section>
    </main>








    <?php get_footer(); ?>