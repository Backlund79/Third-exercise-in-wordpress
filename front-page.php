<?php get_header();  ?>

<div id="wrap">
    <main>
        <section class="hero" style="background-image: url(<?php the_post_thumbnail_url()?>)">
            <div class="container">
                <div class="row">
                    <div class="col column">
                        <div class="text">
                            

                            <?php while(have_posts()){
                                    the_post(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="break">
            <div class="container-fluid">
                <div class="row">
                    <div class="col text-center grey">
                        <h2>Välkommen till min filmsida</h2>
                    </div>
                </div>
            </div>
        </section>
        <section class="columns text-center">
	        <div class="container">
		        <div class="row top">
			        <div class="col-xs-12">
                        <p>
                        <?php the_content(); } ?> 
                        </p>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <?php get_footer(); ?>