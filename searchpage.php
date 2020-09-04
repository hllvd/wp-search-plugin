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

$text = (isset($_GET['s'])) ? $_GET['s'] : "";
$text = (isset($_GET['s'])) ? $_GET['s'] : "";
$searchphrase = (isset($_GET['searchphrase'])) ? $_GET['s'] : "";
$orderby =(isset($_GET['orderby'])) ? $_GET['orderby'] : "";
$order = ($orderby=='date_asc')?$orderby:$order;
$big = 999999999;


$paged = get_query_var('paged') ? get_query_var('paged') : 1;
$args = array(
	's' => $text,
	'posts_per_page' => 15,
	'paged' => $paged,
);
$my_query = new WP_Query($args);

?>

	<div  class="container">
		<main  class="content">

				<header class="archive-header has-text-align-center header-footer-group">
					<div class="archive-header-inner section-inner medium">
					<form method="get" id="advanced-searchform" role="search" action="<?php echo esc_url( home_url( '/' ) ); ?>">
						<div id="advanced-searchform-searchbar">
							<input type="text" class="searcher" value="<?=$text;?>" name="s" placeholder="<?php _e( 'Buscar Palavra-Chave', 'textdomain' ); ?>"   />
							<input type="submit" class="submit-btn" value="Pesquisa" />
						</div>
						<div class="radios-group">
							Pesquisar por:
							<input class="form-check-input" type="radio" name="searchphrase" id="searchphraseall" value="all" >
							<label class="form-check-label" for="">Todas as Palavras</label>
							<input class="form-check-input" type="radio" name="searchphrase" id="searchphraseany" value="any">
							<label class="form-check-label" for="">Quaisquer palavras </label>
							<input class="form-check-input" type="radio" name="searchphrase" id="searchphraseexact" value="exact">
							<label class="form-check-label" for="">Frase exata</label>
						</div>

						<select class="" id="inlineFormCustomSelect" name="orderby">
							<option value="relevance" <?=($orderby=="relevance")?"selected":"" ?>>Relevância</option>
							<option value="date" <?=($orderby=="date" && $order == "desc" )?"selected":"" ?>> Recentes primeiro</option>
							<option value="date_asc" <?=($orderby=="date" && $order == "asc" )?"selected":"" ?>> Antigos primeiro</option>
							<option value="title" <?=($orderby=="title")?"selected":"" ?>>Ordem Alfabética</option>
							<option value="category" <?=($orderby=="cat")?"selecacted":"" ?>>Categoria</option>
						</select>

					</form>
				</div>

			</header><!-- .archive-header -->
		</main>


		<div class="content">
			<?php
							?>
									<?php if ($my_query->have_posts()): ?>
									<?php while($my_query -> have_posts()) : $my_query -> the_post(); ?>
									<div class="post content ">
										<h2><?=the_title()?></h2>
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
