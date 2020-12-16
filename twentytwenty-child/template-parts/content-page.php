<div class="wysiwyg">
    <?php the_content(); ?>
    <h2><?php //the_title(); ?></h2>
</div>

<?php
    get_header();
    $postType = get_post_type( get_the_ID() );
?>

<main id="site-content" role="main">

    <?php //contenue de premième partie de page ?>
    <article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

        <?php //contenue de header: image et introduction?>
        <?php if( $post->post_title !== 'À propos'): ?>

            <?php $v_s_image_bg = get_field('v_s_image_bg'); 
                if( $v_s_image_bg ){
                    $v_s_image_bg = $v_s_image_bg['url'];
                } else {
                    $v_s_image_bg = wp_get_attachment_url(97);
                }
            ?>

            <div class="bg bg--full" style="background-image: url(<?php echo $v_s_image_bg; ?> )">
                <div class="wrapper">
                    <div class="flex">
                        <p class="vs-title"><?php the_field('v_s_introduction'); ?></p>
                    </div>
                </div>
            </div>

        <?php endif; ?>

    </article>

     <?php //affichage de list des articles start ?>
     <?php if( $post->post_title == 'Service' || $post->post_title == 'Vaisselle'): ?>                
     <div class="page_bg_color"> 
        <?php
            $args = array(
                'post_type'			=> 'articles',
                'posts_per_page'	=> -1
            );

            // query
            $the_query = new WP_Query( $args );
        ?>

        <?php if( $the_query->have_posts() ): ?>
            <?php if( $post->post_title == 'Service'): ?>
            <h3 class="servai_title"><?php the_title(); ?></h3>
               
                <div class ="gallery gallery--3">
                <?php while($the_query->have_posts()): $the_query->the_post(); ?>

                    <?php $article_categorie = get_field('article_categorie'); ?>
                    <?php if( $article_categorie == 'Service' && get_field('article_actif') == 1): ?>
                        <article class="gallery_articles">

                            <a href="<?php the_permalink(); ?>">

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
                    <?php endif; ?>
                <?php endwhile; ?>
                </div>
            <?php endif; ?>

            <?php //Vérifier le titre de page ?>
            <?php if( $post->post_title == 'Vaisselle'): ?>
                <h3 class="servai_title"><?php the_title(); ?></h3>
                <div class ="gallery gallery--3">
                <?php while($the_query->have_posts()): $the_query->the_post(); ?>

                    <?php $article_categorie = get_field('article_categorie'); ?>
                    <?php if( $article_categorie == 'Vaisselle' && get_field('article_actif') == 1): ?>
                        <article class="gallery_articles">

                            <a href="<?php the_permalink(); ?>">

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
                    <?php endif; ?>
                <?php endwhile; ?>
                </div>
            <?php endif; ?>

            
            
        <?php endif; ?>
     </div>
     <?php endif; ?>

    <?php //Vérifier la page de à propos ?>
    <?php if( $post->post_title == 'À propos'): ?>
        
        <?php $a_propos_editeur = get_field('a_propos_editeur'); ?>
        <?php if( $a_propos_editeur ): ?>
            <div class="page_propos">
                <centre>
                    <?php echo $a_propos_editeur; ?>
                </centre>
            </div>
        <?php endif; ?>

    <?php endif; ?>

</main><!-- #site-content -->
