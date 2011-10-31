<?php get_header() ?>

<section id="content-main" role="main" class="directory">

    <form action="" method="post" id="groups-directory-form" class="dir-form">
      <h1 class="page-title"><?php the_title(); ?></h1>

      <?php global $user_ID; if( $user_ID ) : if( current_user_can('level_10') ) : ?>
      <p class="create"><a class="button" href="<?php echo bp_get_root_domain() . '/' . BP_GROUPS_SLUG . '/create/' ?>"><?php _e( 'Create a Team', 'buddypress' ) ?></a></p>
      <?php endif; endif; ?>

      <?php do_action( 'bp_before_directory_groups_content' ) ?>

      <div id="groups-dir-list" class="groups dir-list">
        <?php locate_template( array( 'groups/groups-loop.php' ), true ); ?>
      </div>

      <?php do_action( 'bp_directory_groups_content' ); ?>

      <?php wp_nonce_field( 'directory_groups', '_wpnonce-groups-filter' ); ?>

    </form>

    <?php do_action( 'bp_after_directory_groups_content' ); ?>

</section>

<section id="content-sub" role="complementary">
<?php include (TEMPLATEPATH . '/user-state.php'); ?>
<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('sidebar-teams') ) : else : endif; ?>
</section>
<?php get_footer() ?>
