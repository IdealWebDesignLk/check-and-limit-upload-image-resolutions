//note
// check and limit image resolution when upload
add_filter('wp_handle_upload_prefilter', 'mdu_validate_image_size');
    function mdu_validate_image_size($file)
    {
        $image = getimagesize($file['tmp_name']);

        $maximum = array(
            'width' => '3999',
            'height' => '3999'
        );
        $image_width = $image[0];
        $image_height = $image[1];


        $too_large = "Image dimensions are too large. Maximum size is {$maximum['width']} by {$maximum['height']} pixels. Uploaded image is $image_width by $image_height pixels.";

        if ($image_width > $maximum['width'] || $image_height > $maximum['height']) {
            //add in the field 'error' of the $file array the message
            $file['error'] = $too_large;
            return $file;
        } else
            return $file;
    }
