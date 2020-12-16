<?php 
    $article_image = get_field('article_image');
    $article_categorie = get_field('article_categorie');
    $article_description = get_field('article_description');
    $article_prix = get_field('prix');
    $article_actif = get_field('article_actif');
?>


<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<div>

        <h2><?php the_title(); ?></h2>
        
    <div class="post_article_image">
    <?php if( $article_image ): ?>
        <img src="<?php echo $article_image['url'] ?>" alt="<?php the_title(); ?>">
    <?php endif; ?>
    </div>

    <div class="post_article_categorie">
    <?php if( $article_categorie ): ?>
        <p><?php echo $article_categorie ?></p>
    <?php endif; ?>

    <?php if( $article_description ): ?>
        <h5 class="post_article_des">Description</h5>
        <p><?php echo $article_description ?></p>
    <?php endif; ?>
    
    <?php if( $article_prix ): ?>
        <h5 class="post_article_prix"><?php echo $article_prix; ?> $</h5>
    <?php endif; ?>
    </div>
            
    </div>

</article>


