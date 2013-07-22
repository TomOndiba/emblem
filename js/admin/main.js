require.config({
    urlArgs: "noCache=" + (new Date).getTime(),
    baseUrl: 'http://localhost/~filip/dreamhouse/js/',
    waitSeconds: 120,
    dir: "../webapp-build",
    paths: {
        'jquery': 'vendor/jquery-1.8.2.min',
        'jqueryMigrate': 'vendor/jquery-migrate.min',
        'jqueryUI': 'admin/jquery-ui-1.10.3.custom.min',
        'underscore': 'vendor/underscore-min',
        'bootstrap': 'vendor/bootstrap.min',
        'footable': 'admin/footable/footable',
        'footable-sortable': 'admin/footable/footable.sortable',
        'footable-paginate': 'admin/footable/footable.paginate',
        'footable-filter': 'admin/footable/footable.filter',
        'fileuploader': 'libs/fileuploader',
        'imgliquid': 'libs/imgLiquid-min',
        'tinymce': 'vendor/tiny_mce',
        'login': 'admin/login'
    },
    shim: {
        bootstrap: {
            deps: ['jquery'],
            exports: 'Bootstrap'
        },
        footable: {
            deps: ['jquery']
        },
        'footable-filter': {
            deps: ['footable']
        },
        'footable-paginate': {
            deps: ['footable']
        },
        'footable-sortable': {
            deps: ['footable']
        },
        fileuploader: {
            deps: ['jquery']
        },
        imgliquid: {
            deps: ['jquery']
        },
        jqueryUI: {
            deps: ['jquery']
        },
        tinymce: {
            deps: ['jquery']
        }
    }
});

require(
    [
        'jquery',
        'underscore',
        'footable',
        'footable-filter',
        'footable-paginate',
        'footable-sortable',
        'login',
        'bootstrap',
        'fileuploader',
        'imgliquid',
        'jqueryUI',
        'tinymce'
    ],
    function($, _) {
        'use strict';

        var baseurl = 'http://localhost/~filip/dreamhouse/',
            pathname = (window.location.pathname).split('/');

        var someone = {
            notify: function(data) {
                if(data.success) {
                    if(pathname[5] === 'edit') {
                        alert(data.msg);
                    } else {
                        window.location.href = baseurl + 'admin/' + pathname[4] + '/gallery/' + data.id + '/' + data.folder;
                    }
                } else {
                    alert(data.msg);
                }
            },
            bindClicks: function() {
                var that = this;

                $(document).on('click', 'button#createSomeone', function(e) {
                    e.preventDefault();

                    var name = $('#name').val(),
                        folder = $('#folder').val(),
                        category = $('#category').val(),
                        order = $('#order').val(),
                        $description = $('#description'),
                        $description_cz = $('#description_cz'),
                        $link = $('#link'),
                        url = baseurl + 'admin/ajax/createSomeone_ajax';

                    if($description !== 'undefined' && $description_cz !== 'undefined' && $link !== 'undefined') {
                        var description = $description.val(),
                            description_cz = $description_cz.val(),
                            link = $link.val();

                        $.post(url, {name: name, category: category, folder: folder, description: description, description_cz: description_cz, link: link, order: order, section: pathname[4]}, that.notify, 'json');
                    } else {
                        $.post(url, {name: name, category: category, folder: folder, order: order, section: pathname[4]}, that.notify, 'json');
                    }
                });

                $(document).on('click', 'button#updateSomeone', function(e) {
                    e.preventDefault();

                    var id = pathname[6],
                        name = $('#name').val(),
                        category = $('#category').val(),
                        order = $('#order').val(),
                        $description = $('#description'),
                        $description_cz = $('#description_cz'),
                        $link = $('#link'),
                        url = baseurl + 'admin/ajax/updateSomeone_ajax';

                    if($description !== 'undefined' && $description_cz !== 'undefined' && $link !== 'undefined') {
                        var description = $description.val(),
                            description_cz = $description_cz.val(),
                            link = $link.val();

                        $.post(url, {id: id, name: name, category: category, description: description, description_cz: description_cz, link: link, order: order, section: pathname[4]}, that.notify, 'json');
                    } else {
                        $.post(url, {id: id, name: name, category: category, order: order, section: pathname[4]}, that.notify, 'json');
                    }
                });
            },
            init: function() {
                var that = this;

                that.bindClicks();
            }
        };

        var gallery = {
            opts: {},
            saveCallback: function(data) {
                if(data.success) {
                    alert('Gallery successfuly saved.');
                } else {
                    alert('There was an error while saving gallery. Please try again.');
                }
            },
            save: function() {
                var that = this,
                    $sortable = $('#sortable'),
                    $kids = $sortable.find('li'),
                    section = $sortable.find('a.delete-image').data('section'),
                    url = baseurl + 'admin/ajax/sortOrderUpdate_ajax',
                    data = [];

                $.each($kids, function() {
                    data.push({'id': $(this).find('a.delete-image').data('id'), 'order': $(this).data('order'), 'title': $(this).find('textarea#edit-headline').val()});
                });

                $.post(url, {data: data, section: section}, that.saveCallback, 'json');
            },
            sortOrderUpdate: function() {
                var $sortable = $('#sortable'),
                    $kids = $sortable.find('li'), i = 1;

                $.each($kids, function() {
                    $(this).data('order', i);
                    i += 1;
                });
            },
            addPhotoCallBack: function(data) {
                if(data.success) {
                    var img = new Image(),
                        li = $('<li>'),
                        div = $('<div>'),
                        controls_markup = '<div class="controls-container"><a href="#" data-id="' + data.id + '" data-section="' + data.section + '" class="delete-image transition">Delete</a></div>',
                        title_markup = '<div class="headline-container"><textarea name="edit-headline" id="edit-headline" rows="1">' + data.title + '</textarea></div>';

                    img.src = baseurl + 'img/' + pathname[4] + '/' + pathname[7] + '/thumbs/' + data.src;
                    img.onload = function() {
                        div.addClass('image-container span4').append(controls_markup).append(img).append(title_markup);
                        li.addClass('ui-state-default').append(div);
                        $('#image-upload > ul').prepend(li);
                        div.fadeIn(300, gallery.sortOrderUpdate());
                    };

                    $('#headline').val('');
                } else {
                    alert(data.msg);
                }
            },
            addPhotoDb: function(src, tempurl) {
                var that = this;

                $.post(
                    baseurl + 'admin/ajax/addPhotoDb_ajax',
                    {
                        title: $('#headline').val(),
                        src: encodeURIComponent(src),
                        section: pathname[4],
                        folder: that.opts.folder,
                        owner: that.opts.id,
                        tempurl: tempurl
                    },
                    that.addPhotoCallBack,
                    'json'
                );
            },
            deleteCallback: function(data) {
                if(data.success) {
                    var $el = $('#image-upload').find('[data-id="' + data.id + '"]');
                    $el.parents('li').fadeOut(200, function() {
                        $(this).remove();
                    });
                } else {
                    alert(data.msg);
                }
            },
            createUploader: function() {
                var that = this,
                    uploader = new qq.FileUploader({
                        element: document.getElementById('qq'),
                        action: baseurl + 'admin/ajax/image_upload_ajax',
                        debug: true,
                        onComplete:  function(id, fileName, responseText) {
                            if(responseText.success) {
                                var src = responseText.filename,
                                    tempurl = responseText.tempurl;

                                that.addPhotoDb(src, tempurl);
                            }
                        }
                    });
            },
            bindClicks: function() {
                var that = this;

                $(document).on('click', 'button#createGallery', function(e) {
                    e.preventDefault();
                    that.sortOrderUpdate();
                    that.save();
                });

                $(document).on('click', 'a.delete-image', function(e) {
                    e.preventDefault();
                    var id = $(this).data('id'),
                        section = $(this).data('section'),
                        url = baseurl + 'admin/ajax/deleteImage_ajax';

                    $.post(url, {id: id, section: section}, that.deleteCallback, 'json');
                });
            },
            init: function() {
                var that = this,
                    $sortable = $('#sortable');

                that.opts.id = pathname[6];
                that.opts.folder = pathname[7];

                that.bindClicks();
                that.createUploader();

                $sortable.sortable({
                    start: function(event, ui) {
                        console.log('start');
                    },
                    stop: function(event, ui) {
                        console.log('stop');
                    },
                    update: function(event,ui) {
                        that.sortOrderUpdate();
                    }
                }).disableSelection();
            }
        };

        var home = {
            elements: {
                footable: $('.footable'),
                modalEl: $('#modal'),
                modalSlideEl: $('#slide-modal'),
            },
            deleteSomeoneCallback: function(data) {
                if(data.success) {
                    home.elements.modalEl.modal('hide');
                    home.elements.row.remove();
                }
            },
            modal: function() {
                var that = this;

                $(document).on('click', '.delete-someone', function() {
                    var $this = $(this),
                        url = baseurl + 'admin/ajax/deleteSomeone_ajax',
                        id = $this.data('id'),
                        section = $this.data('section'),
                        folder = $this.data('folder'),
                        name = $this.data('name');

                    that.elements.row = $this.parents('tr:first');

                    that.elements.modalEl.modal();
                    $('.modal-body').html('Are you sure you want to delete ' + section.substring(0, section.length - 1) + ' ' + name + '?');

                    $('#delete-yes').on('click', function() {
                        $.post(url, {id: id, section: section, folder: folder}, home.deleteSomeoneCallback, 'json');
                    });
                });

                $(document).on('click', '.delete-slide', function() {
                    var $this = $(this),
                        id = $this.data('id'),
                        url = baseurl + 'admin/ajax/deleteSlide_ajax';

                    that.elements.row = $this.parents('tr:first');
                    that.elements.modalEl.modal();
                    $('.modal-body').html('Are you sure you want to delete this slide?');

                    $('#delete-yes').on('click', function() {
                        $.post(url, {id: id}, home.deleteSomeoneCallback, 'json');
                    });
                });
            },
            init: function() {
                var that = this;

                that.elements.footable.footable();
                that.modal();
            }
        }

        var homepage = {
            src: '',
            tempurl: '',
            imageChanged: false,
            addSlideCallBack: function(data) {
                if(data.success) {
                    alert('Slide successfuly saved!');
                } else {
                    alert(data.msg);
                }
            },
            addSlideDb: function() {
                var that = this;

                if(that.src !== '') {
                    $.post(
                        baseurl + 'admin/ajax/addSlideDb_ajax',
                        {
                            text: tinyMCE.get('text').getContent(),
                            order: $('#order').val(),
                            src: encodeURIComponent(that.src),
                            tempurl: that.tempurl
                        },
                        that.addSlideCallBack,
                        'json'
                    );
                } else {
                    alert('Please upoload an image before you proceed.');
                }
            },
            updateSlide: function() {
                var that = this;

                $.post(
                    baseurl + 'admin/ajax/updateSlide_ajax',
                    {
                        text: tinyMCE.get('text').getContent(),
                        order: $('#order').val(),
                        id: pathname[6]
                    },
                    that.addSlideCallBack,
                    'json'
                );
            },
            updateSlideWithImg: function() {
                var that = this;

                $.post(
                    baseurl + 'admin/ajax/updateSlideWithImg_ajax',
                    {
                        text: tinyMCE.get('text').getContent(),
                        order: $('#order').val(),
                        src: that.src,
                        tempurl: that.tempurl,
                        id: pathname[6]
                    },
                    that.addSlideCallBack,
                    'json'
                );
            },
            createUploader: function() {
                var that = this,
                    uploader = new qq.FileUploader({
                        element: document.getElementById('qq'),
                        action: baseurl + 'admin/ajax/image_upload_ajax',
                        debug: true,
                        onComplete:  function(id, fileName, responseText) {
                            if(responseText.success) {
                                that.src = responseText.filename,
                                that.tempurl = responseText.tempurl;
                                that.imageChanged = true;

                                var img = new Image(),
                                    controls_markup = '<div class="controls-container"><a href="#" data-url="' + that.tempurl + '" id="delete-temp-image" class="delete-image transition">Delete</a></div>',
                                    container = $('#slide-image-container');

                                img.src = baseurl + 'tmp/' + that.src;
                                img.onload = function() {
                                    container.append(controls_markup).append(img);
                                    $(this).fadeIn(300);
                                };
                            }
                        }
                    });
            },
            deleteTempImgCallback: function(data) {
                if(!data.success) {
                    alert(data.msg);
                } else {
                    $('#slide-image-container').empty();
                }
            },
            clicks: function() {
                var that = this;

                $(document).on('click', '#createSlide', function(e) {
                    e.preventDefault();

                    that.addSlideDb();
                });

                $(document).on('click', '#updateSlide', function(e) {
                    e.preventDefault();

                    if(that.imageChanged) {
                        that.updateSlideWithImg();
                    } else {
                        that.updateSlide();
                    }
                });

                $(document).on('click', '#delete-temp-image', function(e) {
                    e.preventDefault();

                    var $this = $(this),
                        tempurl = $this.data('url'),
                        url = baseurl + 'admin/ajax/deleteTempImg_ajax';

                    $.post(url, {tempurl: tempurl}, that.deleteTempImgCallback, 'json');
                });

                $(document).on('click', '#delete-slide-image', function(e) {
                    e.preventDefault();

                    var $this = $(this),
                        id = $this.data('id'),
                        url = baseurl + 'admin/ajax/deleteSlideImg_ajax';

                    $.post(url, {id: id}, that.deleteTempImgCallback, 'json');
                });
            },
            init: function() {
                var that = this;

                tinyMCE.init({
                    mode : 'exact',
                    elements : 'text',
                    theme : 'advanced',
                    theme__buttons1 : 'bold,italic',
                    theme_advanced_buttons2 : '',
                    theme_advanced_buttons3 : '',
                    theme_advanced_toolbar_location : 'top',
                    theme_advanced_toolbar_align : 'left',
                    theme_advanced_statusbar_location : 'bottom',
                    gecko_spellcheck : false
                });

                that.createUploader();
                that.clicks();
            }
        }

        $(function() {
            console.log('Starting the engines...');

            (pathname[5] === '' || pathname[5] === undefined) ? home.init() : console.log('Not a home page.');
            (pathname[5] === 'create' || pathname[5] === 'edit') ? someone.init() : console.log('Not a creation page');
            (pathname[5] === 'create_slide' || pathname[5] === 'edit_slide') ? homepage.init() : console.log('Not a homepage creation page');
            (pathname[5] === 'gallery' || pathname[5] === 'edit_gallery') ? gallery.init() : console.log('Not a gallery page');
        });
    });