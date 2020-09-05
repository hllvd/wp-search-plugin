<?php
/**
 * The template for displaying all single posts - copied from Twenty_Nineteen themplate
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage
 * @since Twenty Nineteen 1.0
 */
 get_header();

$s 							=		(isset($_GET['s'])) ? filter_var( strip_tags($_GET['s']), FILTER_SANITIZE_STRING) : "";
$search_by 			= 	(isset($_GET['search_by'])) ? filter_var( strip_tags($_GET['search_by']), FILTER_SANITIZE_STRING) : "";
$orderby 				=		(isset($_GET['orderby'])) ? filter_var( strip_tags($_GET['orderby']), FILTER_SANITIZE_STRING)  : "";
$order 					=		(isset($_GET['order']))?filter_var( strip_tags($_GET['order']), FILTER_SANITIZE_STRING):"";

if($orderby == 'date_asc'){
	$orderby = 'date';
	$order = 'asc';
}

/**get all categories term**/
$args_cat = [
    'orderby' => 'name',
    'order' => 'ASC',
    'hide_empty' => 0,
];
$categories = get_categories($args_cat);

$big = 999999999;
$paged = get_query_var('paged') ? get_query_var('paged') : 1;
$args = array(
	's' => $s,
	'posts_per_page' => 15,
	'paged' => $paged,
	 $search_by => true,
	 'order_by' => $orderby,
	 'order'=>$order
);

if( $orderby == "cat") {
	$args['cat'] = $category->term_id;
}



$my_query = new WP_Query($args);

?>
	<div  class="container">
      <br/>
		<main  class="content form">
					<form method="get"  role="search" action="<?php echo esc_url( home_url( '/' ) ); ?>">
            <div class="row">
              <div class="col-md-6">
					<input type="text" class="form-control" value="<?=$s;?>" name="s" placeholder="<?php _e( 'Buscar Palavra-Chave', 'textdomain' ); ?>" >
				</div>
              <div class="col-md-3">
                </span> <button  class="submit-btn form-control" value="Pesquisa" /><span class="icon-search"> Pesquisa</button>
              </div>
            </div>

            <div class="row radio-group">
              <div class="col-md-3 ">
                <input class="form-check-input" type="radio" name="search_by" id="search_byall" value="all"  <?=( $search_by == "all")?"checked":"" ?> >
                <label class="form-check-label" for="">Todas as Palavras</label>
              </div>
              <div class="col-md-3">
                <input class="form-check-input" type="radio" name="search_by" id="search_byany" value="sentence"  <?=( $search_by == "sentence")?"checked":"" ?>>
                <label class="form-check-label" for="">Quaisquer palavras </label>
              </div>
              <div class="col-md-3">
                <input class="form-check-input" type="radio" name="search_by" id="search_byexact" value="exact"  <?=( $search_by == "exact")?"checked":"" ?>>
                <label class="form-check-label" for="">Frase exata</label>
                </div>
              </div>
            <div class="row">
              <div class="col-md-6">
               	<input id="order" type="hidden" name="order" value="">
               
				<select class="" id="inlineFormCustomSelect" name="orderby" onchange="return func()">
                  <option value="relevance" <?=($orderby=="relevance")?"selected":"" ?>>Relevância</option>
                  <option value="date" <?=($orderby=="date" && $order == "desc" )?"selected":"" ?>> Recentes primeiro</option>
                  <option value="date_asc" <?=($orderby=="date" && $order == "asc" )?"selected":"" ?>> Antigos primeiro</option>
                  <option value="title" <?=($orderby=="title")?"selected":"" ?>>Ordem Alfabética</option>
                  <option value="cat" <?=($orderby=="cat")?"selected":"" ?>>Categoria</option>
                </select>
              </div>
            </div>
					</form>
		</main>
<hr/>

		<div class="content search-result">
			<?php
							?>
									<?php if ($my_query->have_posts()): ?>
									<?php while($my_query -> have_posts()) : $my_query -> the_post(); ?>
									<div class="post content ">
										<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><h2><?=the_title()?></h2></a>
										<div class="meta-post"><?=the_tags()?> <?=the_author()?> </div>

										<?=the_excerpt()?>
										<p><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>">Continue lendo </a></p>


									</div>

							<?php endwhile;
									echo paginate_links( array(
																	'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
																	'format' => '?paged=%#%',
																	'current' => max( 1, get_query_var('paged') ),
																	'total' => $my_query->max_num_pages
																	) );
									wp_reset_postdata();
							?>

					<?php else: ?>
							<p>Sem resultado</p>
					<?php endif; ?>

					<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'search' ); ?>

			<?php endwhile; ?>
		</div>




	</div>







<?php
get_footer();
