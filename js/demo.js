/*
 * blueimp Gallery Demo JS 2.11.1
 * https://github.com/blueimp/Gallery
 *
 * Copyright 2013, Sebastian Tschan
 * https://blueimp.net
 *
 * Licensed under the MIT license:
 * http://www.opensource.org/licenses/MIT
 */

/* global blueimp, $ */

$(function () {
    'use strict';

    // Load demo images from flickr:
    $.ajax({
        url: 'https://api.flickr.com/services/rest/',
        data: {
            format: 'json',
            method: 'flickr.interestingness.getList',
            api_key: '7617adae70159d09ba78cfec73c13be3' // jshint ignore:line
        },
        dataType: 'jsonp',
        jsonp: 'jsoncallback'
    }).done(function (result) {
        var carouselLinks = [],
            linksContainer = $('#links'),
            baseUrl;
        
        // Initialize the Gallery as image carousel:
        blueimp.Gallery(carouselLinks, {
            container: '#blueimp-image-carousel',
            carousel: true
        });
    });

    // Initialize the Gallery as video carousel:
    blueimp.Gallery([
        {
            title: 'Showreel / Natalia Rzeźniak Pospieszalska',
            href: 'video/Natalia_Rzezniak-Pospieszalska_Showel.mp4',
            type: 'video/mp4',
            poster: 'images/poster/vimeo.jpg'
        },
        {
            title: 'Golgota Wrocławska / Spektakl Teatru Telewizjii',
            href: 'video/Natalia_Rzezniak-Pospieszalska_Golgota_Wroclawska.mp4',
            type: 'video/mp4',
            poster: 'images/poster/golgota.jpg'
        },
        {
            title: 'Last Minute / Best Smartfon Movie Award na International HongKong Film Festival',
            href: 'video/Natalia_Rzezniak-Pospieszalska_Last_Minute.mp4',
            type: 'video/mp4',
            poster: 'images/poster/google2.jpg'
        }
    ], {
        container: '#blueimp-video-carousel',
        carousel: true
    });

});
