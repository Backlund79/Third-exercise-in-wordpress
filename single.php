<?php get_header();?>
<!-- Sida för undersida -->
<main>
    <section class="break">
        <div class="container-fluid">
            <div class="row">
                <div class="col text-center grey">
                    <h2><?php the_title();?></h2>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container">

            <div class="row">

                <div class="col-sm-7 p-3">
                    <?php 
                    if (have_posts()){
                        while(have_posts()){
                            the_post();
                            the_post_thumbnail();
                            
                        } 
                    } 
                    ?>
                </div>
                <div class="col-sm-5 p-3">

                    <p> <strong>Genre: </strong> <?php 
                                $genre = get_the_terms(get_the_ID(), 'movie_genre');
                                foreach($genre as $value){
                                   
                                    echo $value->name;
                                    echo ', ';
                                }

                             ?> </p>
                    <p> <strong>Produktionsbolag: </strong> <?php 
                                $prod = get_the_terms(get_the_ID(), 'movie_production');
                                foreach($prod as $value){
                                   
                                    echo $value->name;
                                    echo ', ';
                                }

                             ?> </p>
                    <p> <strong>Åldersgräns: </strong> <?php 
                                $age = get_the_terms(get_the_ID(), 'movie_age');
                                foreach($age as $value){
                                   
                                    echo $value->name;
                                    echo ', ';
                                }

                             ?> </p>
                    <p> <strong>Regissör: </strong> <?php the_field('regissor'); ?> </p>
                    <p> <strong>Premiär: </strong> <?php the_field('premiar_datum'); ?> </p>
                    <p> <strong>Handling: </strong> <?php the_field('handling'); ?> </p>

                </div>

            </div>
        </div>
    </section>

    <section class="break">
        <div class="container-fluid mb-3">
            <div class="row">
                <div class="col text-center grey">
                    <h2>Skådespelare</h2>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="row">
                <?php 
                        if(have_rows('skadespelare')){
                            while(have_rows('skadespelare')){
                                the_row(); ?>
                <div class="col-sm-3 p3">
                    <div class="card bg-light mb-3" style="max-width: 18rem;">
                        <div class="card-header"><?php the_sub_field('roll'); ?></div>
                        <div class="card-body">
                            <?php $posts = get_sub_field('skadespelare');

                                if($posts){
                                    foreach($posts as $post){
                                        setup_postdata($post); 

                                        ?>
                            <h5 class="card-title"><a href="<?php the_permalink()?>"><?php the_title(); ?></h5></a>
                            <p class="card-text"></p><?php

                            }
                            wp_reset_postdata();
                            }?>
                        </div>
                    </div>
                </div>
                <?php }
                    }?>
            </div>
        </div>
    </section>
</main>


<?php get_footer();?>