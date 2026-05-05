<?php

/**
 * Template Name: Members Page
 */

get_header(); ?>

<div class="dept-container">
    <!-- TABS -->
    <div class="dept-tabs">

        <!-- get all departments -->
        <?php
        $departments = get_terms(array(
            'taxonomy'   => 'department',
            'hide_empty' => true,
        ));
        // echo '<pre>';
        // print_r($departments);
        // echo '</pre>';

        // if department is not empty loop through it
        if (!empty($departments) && !is_wp_error($departments)) :

            foreach ($departments as $index => $dept) : ?>

                <!-- for each  department, make a tab block. Also add a is-active class if it is the first tab-->
                <div class="dept-tabs__block <?php echo $index === 0 ? 'is-active' : ''; ?>" data-tab="dept-<?php echo esc_attr($dept->term_id); ?>">
                    <?php echo esc_html($dept->name); ?>
                </div>

            <?php endforeach;
        else : ?>
            <p>No departments found.</p>
        <?php endif; ?>
    </div>

    <!-- if departments is not empty loop through it to find its related members -->
    <?php if (!empty($departments) && !is_wp_error($departments)) :

        foreach ($departments as $index => $dept) :
            // use wp_query to find the members of the department
            $members = new WP_Query(array(
                'post_type'      => 'team',
                'posts_per_page' => -1,
                'tax_query'      => array(
                    array(
                        'taxonomy' => 'department',
                        'field'    => 'term_id',
                        'terms'    => $dept->term_id,
                    ),
                ),
            ));
    ?>

            <!-- display the member details of the tab -->
            <div class="dept-panel <?php echo $index === 0 ? 'is-active' : ''; ?>" id="dept-<?php echo esc_attr($dept->term_id); ?>">

                <div class="member-grid">
                    <?php
                    while ($members->have_posts()) : 
                        $members->the_post();
                        $position = get_post_meta(get_the_ID(), 'member_position', true);
                        $yoe      = get_post_meta(get_the_ID(), 'member_yoe',      true);
                        $address  = get_post_meta(get_the_ID(), 'member_address',  true);
                        $contact  = get_post_meta(get_the_ID(), 'member_contact',  true);
                    ?>

                        <div class="member-card">
                            <div class="member-card__details">
                                <h3 class="member-card__name"><?php the_title(); ?></h3>

                                <p class="member-card__position">Position: <?php echo esc_html($position); ?></p>

                                <p class="member-card__meta">Experience: <?php echo esc_html($yoe); ?></p>

                                <p class="member-card__meta">Address: <?php echo esc_html($address); ?></p>

                                <p class="member-card__meta">Contact: <?php echo esc_html($contact); ?></p>
                            </div>
                        </div>

                    <?php endwhile;
                    wp_reset_postdata();
                    ?>
                </div>

            </div>

    <?php endforeach;
    endif; ?>

</div>

<?php get_footer(); ?>