require('./bootstrap');

$(document).ready(function () {
    $('.js-sidebar-collapse').on('click', function () {
        $($(this).data('toggle')).toggleClass('active').addClass('transition');
    });

    if ($('.js-color-picker').length) {
        var $picker = $('.js-color-picker');

        function updatePickerLabelBackground() {
            var $pickerLabel = $('.js-color-picker-label');

            $pickerLabel.css(
                'background', 
                $picker.val() != '' ? $picker.val() : 'white'
            );
        }

        updatePickerLabelBackground();

        $picker.on('change', function() {
            updatePickerLabelBackground();
        });
    }
});
