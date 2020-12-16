<?php
/**
 * The template for displaying single posts and pages.
 */
                            
get_header();

$postType = get_post_type( get_the_ID() );

?>

<main id="site-content" role="main">

    <!--contenue de premième partie de page d'accueil-->
    <article <?php post_class(); ?> id="post-<?php the_ID(); ?>">


        <?php //Slogan et image background ?>
        <?php $accueil_image_bg = get_field('accueil_image_bg'); 
            if( $accueil_image_bg ){
                $accueil_image_bg = $accueil_image_bg['url'];
            } else {
                $accueil_image_bg = wp_get_attachment_url(97);
            }
        ?>

        <div class="bg bg--full" style="background-image: url(<?php echo $accueil_image_bg; ?> )">
            <div class="wrapper">
                <div class="flex flex--center">
                    <h2 class="slogan"><?php echo get_field('accueil_slogan'); ?></h2>
                </div>
            </div>
        </div>

        <?php //Introduction de page d'accueil ?> 
        <div class="intro">
            <?php $accueil_introduction = get_field('accueil_introduction'); ?>
            <?php if( $accueil_introduction ): ?>
                <p><?php echo $accueil_introduction ?></p>
            <?php endif; ?>
        </div>   

    </article>


    <!--affichage de list des articles start-->                
    <div class="article_bg_color"> 

        <?php
            $args = array(
                'post_type'			=> 'articles',
                'posts_per_page'	=> -1
            );

            // query
            $the_query = new WP_Query( $args );
        ?>

        <?php if( $the_query->have_posts() ): ?>

        <?php $nbpost = 4; ?> <!--définir un paramètre global de nombre à afficher des articles-->
        <h3 class="servai_title">Service</h3>
        <div class ="gallery gallery--4">
            <?php $x=1; while( ($the_query->have_posts())&& ($x <= $nbpost)) : $the_query->the_post(); ?>

                            <?php $article_categorie = get_field('article_categorie'); ?>
                            <!--boucle pour la condition de Service-->

                                <?php if( $article_categorie == 'Service' && get_field('article_actif') == 1): ?>
                                    <article class="gallery_articles">
                    
                                        <a href="<?php the_permalink(); ?>">
                                            <p><?php //echo $article_categorie; ?></p>
                                            <p><?php //echo get_field('article_actif'); ?></p>

                                            <?php $article_image = get_field('article_image'); ?>
                                            <?php if( $article_image ): ?>
                                            <div class="gallery_articles_image">
                                                <img src="<?php echo $article_image['url']; ?>" alt="<?php the_title(); ?>" />
                                            </div>
                                            <?php endif; ?>

                                            <div>
                                                <h6 class="servai_sub_title"><?php the_title(); ?></h6>
                                            </div>
                                        </a>
                    
                                     </article>
                                 <?php $x++; endif; ?>
    
            <?php endwhile; ?>
        </div> 

        <h3 class="servai_title">Vaisselle</h3>
        <div class ="gallery gallery--4">
              <?php $x=1; while( ($the_query->have_posts())&& ($x <= $nbpost))  : $the_query->the_post(); ?>

                            <?php $article_categorie = get_field('article_categorie'); ?>
                            <!--boucle pour la condition de Service-->
                           
                                <?php if( $article_categorie == 'Vaisselle' && get_field('article_actif') == 1): ?>
                                    <article class="gallery_articles">
                    
                                        <a href="<?php the_permalink(); ?>">
                                            <p><?php //echo $article_categorie; ?></p>
                                            <p><?php //echo get_field('article_actif'); ?></p>

                                            <?php $article_image = get_field('article_image'); ?>
                                            <?php if( $article_image ): ?>
                                            <div class="gallery_articles_image">
                                                <img src="<?php echo $article_image['url']; ?>" alt="<?php the_title(); ?>" />
                                            </div>
                                            <?php endif; ?>

                                            <div>
                                                <h6 class="servai_sub_title"><?php the_title(); ?></h6>
                                            </div>
                                        </a>
                    
                                    </article>
                                <?php $x++; endif; ?>
                
                <?php endwhile; ?>
                
           
        </div> 
                                
                           
                 

        <!--div grid4-->
        <?php endif; ?>
    </div><!--div background pink-->








<!--boucle copy -->

<!--boucle copy end-->









    <?php wp_reset_query();	 // Restore global post data stomped by the_post(). ?>



   <!-- </div>-->
    <!--affichage de list des articles end-->




</main><!-- #site-content -->

<?php get_template_part( 'template-parts/footer-menus-widgets' ); ?>

<?php get_footer(); ?>