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

                <div class="col-sm-5 p-3">
                    <?php 
                    if (have_posts()){
                        while(have_posts()){
                            the_post();
                            if(get_field('bild')){?>
                                <img class="img-fluid max-width: 50%" src="<?php the_field('bild'); ?>" />
                            <?php }
                            
                        } 
                    } 
                    ?>
                </div>
                <div class="col-sm-7 p-3">
                    <h2> Födelsedatum: </h2> <p><?php the_field('fodelsedatum'); ?></p> 
                    <h2> Nationalitet: </h2> <p><?php the_field('nationalitet'); ?></p> 
                    <h2> Historik:  </h2> <p><?php the_field('historia'); ?></p> 
                </div>

            </div>
        </div>
    </section>


</main>


<?php get_footer();?>