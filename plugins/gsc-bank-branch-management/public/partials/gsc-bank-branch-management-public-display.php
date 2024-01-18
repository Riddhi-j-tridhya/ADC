<?php

/**
 * Provide a public-facing view for the shortcode
 *
 *
 * @link       https://www.quanticedgesolutions.com
 * @since      1.0.0
 *
 * @package    Gsc_Bank_Branch_Management
 * @subpackage Gsc_Bank_Branch_Management/public/partials
 */
?><div class="gsc-branch-section">
    <div class="gsc-branch-selections">
        <select class="gsc-branch-selection" id="gsc-branch-selection">
            <option value=""><?php _e('Select the branch','gsc-bank-branch-management'); ?><?php 
            foreach( $branches as $branch ){
                ?><option value="<?php echo $branch->ID; ?>"><?php echo $branch->post_title; ?></option><?php 
            }
        ?></select>
    </div>
    <div class="gsc-bank-branches"><?php
        foreach( $branches as $branch ){
            ?><div class="gsc-bank-branch" id="gsc-bank-branch-<?php echo $branch->ID; ?>">
                <div class="gsc-bank-branch-info">
                    <h3 class="gsc-bank-branch-name"><?php echo sprintf( __('%s Branch :', 'gsc-bank-branch-management'), $branch->post_title ); ?></h3><?php
                    $address = get_field( 'address', $branch->ID );
					$city = get_field( 'city', $branch->ID );
					$pin = get_field( 'pin_code', $branch->ID );
                    if( !empty( $address ) ){
                        ?><p class="gsc-bank-branch-address"><?php echo nl2br( $address ); ?><br>
					<?php echo nl2br( $city ); ?><br>
					<?php echo __('PIN Code: ', 'gsc-bank-branch-management'). ' ' . $pin;  ?></p><?php
                    }
					
                       
                    $phone = get_field( 'phone', $branch->ID );
                    $ifsc = get_field( 'ifsc_code', $branch->ID );
			
                    $fax = get_field( 'fax', $branch->ID );
                    if( !empty( $phone ) || !empty( $ifsc ) || !empty( $fax ) ){
                        ?><div class="gsc-bank-brach-details"><?php
                            if( !empty( $phone ) ){
                                ?><span class="gsc-bank-branch-phone"><?php echo $phone; ?></span><?php
                            }
                            if( !empty( $fax ) ){
                                ?><span class="gsc-bank-branch-fax"><?php echo  $fax; ?></span><?php
                            }
                            if( !empty( $ifsc ) ){
                                ?><span class="gsc-bank-branch-ifsc-code"><?php  echo __('IFSC Code: ', 'gsc-bank-branch-management') . ' ' . $ifsc; ?></span><?php
                            }
                        ?></div><?php
                    }
                ?></div><?php
                $facilities = get_field( 'facilities_at_branch', $branch->ID );
                if( !empty( $facilities ) ){
                    ?><div class="gsc-bank-branch-facilities"><?php
                        ?><h3><?php _e('Facilities at Branch:','gsc-bank-branch-management'); ?></h3><?php
                        foreach( $facilities as $facility ){
                            ?><span class="gsc-bank-branch-facility gsc-bank-branch-facility-<?php echo $facility['value']; ?>"><?php echo $facility['label']; ?></span><?php
                        }
                    ?></div><?php
                }

                $information = get_field( 'information', $branch->ID );
                if( !empty( $information ) ){
                    ?><div class="gsc-bank-branch-information">
                        <h3><?php _e('Information:','gsc-bank-branch-management'); ?></h3>
                        <p class="gsc-bank-branch-information-info"><?php echo $information; ?></p>
                    </div><?php 
                }
            ?></div><?php
        }
    ?></div>
</div>