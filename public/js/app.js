function readURL(input) {
    // var input = $("#photo_profile")

    if (input.files && input.files[0]) {
        var reader = new FileReader()

        reader.onload = function (e) {
            $('#image_preview')
                .attr('src', e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
    }
}
