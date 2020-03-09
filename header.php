<!DOCTYPE html>
<html lang="en">

<head>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <header id="header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 p-0">
                    <div class="pos-f-t">
                        <nav class="navbar navbar-dark bg-dark">
                            <?php wp_nav_menu (
                                array(
                                    'theme_location' => 'top-menu',
                                )
                            );?>
                        </nav>
                        <!-- <nav class="navbar navbar-dark bg-dark d-flex justify-content-start">
                            <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent"
                                aria-expanded="false" aria-label="Toggle navigation" title="Meny" >
                                <h4 style="color: white;">Meny</h4>
                            </button>   


                        </nav>
                        <div class="collapse" id="navbarToggleExternalContent">
                            <div class="bg-dark p-1">

                                    
                                
                            </div> -->
                        
                    </div>
                </div>
            </div>
        </div>
    </header>