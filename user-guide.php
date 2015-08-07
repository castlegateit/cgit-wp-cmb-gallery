<h3>Galleries</h3>

<p>An image gallery can be added to a page using the Gallery field. Each image can have a title and alternative text (a description of the image used by screen readers). These fields are optional. Click &ldquo;Add New Group&rdquo; to add a new item to the gallery. Galleries are available on <?php

    $types = cgit_gallery_fields(array())[0]['pages'];
    $names = array();
    $list = '';

    if (is_string($types)) {
        $types = array($types);
    }

    foreach ($types as $type) {
        $names[] = get_post_type_object($type)->label;
    }

    switch (count($names)) {
        case 1:
            $list = array_pop($names);
            break;
        case 2:
            $list = implode(' and ', $names);
            break;
        default:
            $last = array_pop($names);
            $list = implode(', ', $names) . ', and ' . $last;
            break;
    }

    echo $list;

?>.</p>

<figure>
    <img src="<?php echo plugin_dir_url(__FILE__); ?>images/fields.png" alt="" />
    <figcaption>The gallery field. This will appear below the main content editor fields.</figcaption>
</figure>
