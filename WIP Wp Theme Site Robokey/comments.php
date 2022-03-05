<div class="comments-wrapper">
    <div class="comments" id=""comments>
        <div class="comments-header">
            <!-- Comments title -->
            <p class="comment-reply-title">
                <?php 
                    if(! have_comments()){
                      echo "Leave a comment";
                    }
                    else{  
                      echo comments_number();
                    }
                ?>
            </p>
        </div>
        <div class="comments-inner">
            <?php
                wp_list_comments( 
                    array(
                  'reverse_top_level' => true,
                  'max_depth' => 3,
                  'avatar-size' => 120,
                  'style' => 'ul', 

                )
            );
            ?>
            
        </div>
    </div>
    <hr class="" aria-hidden="true">
    <?php
        if( comments_open()){
            comment_form(
                array(
                    'class_form' => '',
                    'title_replay_before' => '<h2 id="replay-title" class="comment-replay-title>',
                    'title_replay_after' => '</h2>'
                )
            );
        }
    ?>
</div>