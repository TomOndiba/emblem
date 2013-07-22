({
    baseUrl: '/Users/svemirko/Sites/dreamhouse/js/admin',
    paths: {
        'jquery': '../vendor/jquery.min',
        'jqueryMigrate': '../vendor/jquery-migrate.min',
        'jqueryUI': 'jquery-ui-1.10.3.custom.min',
        'underscore': '../vendor/underscore-min',
        'bootstrap': '../vendor/bootstrap.min',
        'footable': 'footable/footable',
        'footable-sortable': 'footable/footable.sortable',
        'footable-paginate': 'footable/footable.paginate',
        'footable-filter': 'footable/footable.filter',
        'fileuploader': '../plugins/fileuploader',
        'imgliquid': '../plugins/imgLiquid-min',
        'tinymce': '../vendor/tiny_mce'
    },
    name: "main",
    excludeShallow: ['tinymce'],
    out: "main-built.js"
})