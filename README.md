# Castlegate IT WP CMB Gallery #

**Development of this plugin has now stopped. We now recommend [Advanced Custom Fields](http://www.advancedcustomfields.com/) for all custom WordPress fields.**

Simple gallery field using [Custom Meta Boxes](https://github.com/humanmade/Custom-Meta-Boxes). Defines a field called `gallery`, which can be displayed with the `get_field()`, `the_field()`, or `get_post_meta()` functions:

    get_field('gallery', $post_id, FALSE);

The third argument must be `FALSE` to return an array of gallery items. If it is not set, or it is set to `TRUE`, only the first item will be returned. The plugin also provides a shortcode (named `cgit_gallery` to avoid conflicting with the default WordPress gallery shortcode):

    [cgit_gallery]

This generates a gallery as a simple unordered list:

    <div class="cgit-gallery">
        <ul>
            <li><a href="image.jpg" title="Example"><img src="thumb.jpg" alt="Example" /></a></li>
            <li><a href="image.jpg" title="Example"><img src="thumb.jpg" alt="Example" /></a></li>
        </ul>
    </div>

The default gallery fields can be edited with the `cgit_gallery_fields` filter.
