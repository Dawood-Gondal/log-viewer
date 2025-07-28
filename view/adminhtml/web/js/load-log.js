/**
 * @category    M2Commerce Enterprise
 * @package     M2Commerce_OrderComment
 * @copyright   Copyright (c) 2025 M2Commerce Enterprise
 * @author      dawoodgondaldev@gmail.com
 */

define(['jquery'], function ($) {
    'use strict';

    return function (config) {
        let $btn = $('#' + config.buttonId);

        $btn.on('click', function () {
            let file = $btn.data('file'),
                start = parseInt($btn.data('start')),
                displayLines = parseInt($btn.data('display-lines')),
                ajaxUrl = config.ajaxUrl;

            $.ajax({
                url: ajaxUrl,
                showLoader: true,
                data: {
                    file: file,
                    offset: start,
                    lines: displayLines,
                    form_key: window.FORM_KEY
                },
                success: function (res) {
                    if (res.success) {
                        if (res.data.trim()) {
                            $('#log-output').prepend(res.data + '\n');
                            $btn.data('start', start + displayLines);
                        }

                        if (!res.has_more) {
                            $btn.prop('disabled', true);
                        }
                    }
                }
            });
        });
    };
});
