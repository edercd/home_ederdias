<?php get_header(); ?>
<div class="container-fluid  mt-2 pt-3">
  <hr class="m-0 mb-4 p-0 ">
	<div class="row justify-content-center">
		<div class="col-12 pb-0 mt-1   ">		
			<menu class="text-center menu-portfolio mt-0 mb-0 mx-auto">       
				 <a class="text-uppercase btn btn-outline-secondary box-shadow mt-0 mb-3" data-filter="all" >todos</a>
				 
				 <?php
							$args = array(
								'orderby' => 'name',
								'order'   => 'ASC',
							);
							$categories = get_categories($args);
							foreach ($categories as $category) {
								echo '<a class="text-uppercase btn btn-outline-secondary box-shadow mt-0 mb-3" data-filter="'.$category->name.'" >'.$category->name.'</a>';
								echo ''.$category->description.' ';
							}
					?>

				<!--  <a class="text-uppercase btn btn-outline-secondary box-shadow mt-0 mb-3" data-filter="pj1" >Projeto 1</a>
				 <a class="text-uppercase btn btn-outline-secondary box-shadow mt-0 mb-3" data-filter="pj2" >Projeto 2</a>
				 <a class="text-uppercase btn btn-outline-secondary box-shadow mt-0 mb-3" data-filter="pj3" >Projeto 3</a>
				 <a class="text-uppercase btn btn-outline-secondary box-shadow mt-0 mb-3" data-filter="pj4" >Projeto 4</a>
				 <a class="text-uppercase btn btn-outline-secondary box-shadow mt-0 mb-3" data-filter="pj5" >Projeto 5</a>
				 <a class="text-uppercase btn btn-outline-secondary box-shadow mt-0 mb-3" data-filter="pj6" >Projeto 6</a> -->
	            
			</menu><!-- fim config menu do menu do portfolio da home -->
		</div>
	</div>
</div>
<div class="container-fluid">
	<div class="row ">
		<?php $args = array(
			'orderby' => 'name',
			'order'   => 'ASC',
		);
		$categories = get_categories($args);
		
		//O loop -->
 		if ( have_posts() ) : while ( have_posts() ) : the_post();
 			?>
 			<div class="col-5 col-sn-6 col-md-4 col-lg-3 col-xl-3 col-xxl-3 filter <?php '.$category->name.'?> ">
 				<div class="card box-portflolio ">
 					<div class="card-body p-0 ">
 						<div  class="card-img">
 							<?php the_post_thumbnail(); ?>
      			</div>
      		</div><!-- /card-body -->
      		<a href="<?php the_permalink(); ?>" class=" card-footer  text-center text-uppercase"><?php the_title(); ?></a><!-- /card-footer -->
				</div><!-- fim config card -->
			</div>
			<?php endwhile;
			endif; ?>
			</div>
		</div>
	</div>
</div><!--fim comfig container-fluid do portfólio  -->

<?php get_footer();?>
