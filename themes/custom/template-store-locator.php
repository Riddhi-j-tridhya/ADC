<?php
/*
Template Name: Store Locator
*/

get_header();

// Query all location posts
$locations_query = new WP_Query( array(
    'post_type'      => 'location',
    'posts_per_page' => -1,
) );
?>

<div class="store-locator-container">
    <div class="locations-list">
        <ul>
            <?php while ( $locations_query->have_posts() ) : $locations_query->the_post(); ?>
                <li>
                    <h3><?php the_title(); ?></h3>
                    <p><?php echo get_post_meta( get_the_ID(), 'address', true ); ?></p>
                </li>
            <?php endwhile; ?>
        </ul>
    </div>

    <div id="map"></div>
</div>

<script>
function initMap() {
    var locations = [
        <?php while ( $locations_query->have_posts() ) : $locations_query->the_post(); ?>
            {
                title: '<?php the_title(); ?>',
                address: '<?php echo get_post_meta( get_the_ID(), 'address', true ); ?>',
                lat: <?php echo get_post_meta( get_the_ID(), 'latitude', true ); ?>,
                lng: <?php echo get_post_meta( get_the_ID(), 'longitude', true ); ?>
            },
        <?php endwhile; ?>
    ];

    var map = new google.maps.Map(document.getElementById('map'), {
        center: {lat: 0, lng: 0},
        zoom: 2
    });

    locations.forEach(function(location) {
        var marker = new google.maps.Marker({
            position: {lat: location.lat, lng: location.lng},
            map: map,
            title: location.title
        });

        var infowindow = new google.maps.InfoWindow({
            content: '<h3>' + location.title + '</h3><p>' + location.address + '</p>'
        });

        marker.addListener('click', function() {
            infowindow.open(map, marker);
        });
    });
}
</script>

<?php
wp_enqueue_script( 'google-maps', 'https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap', array(), null, true );

get_footer();
?>
