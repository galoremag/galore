/*global module*/
module.exports = function(grunt) {
    var js_src_files = ['js/*.js',
                        '!js/script-min.js',
                        '!js/script-ck.js',
                        '!js/jquery-1.9.0.min.js'],
        less_src_files = ['style/less/style.less'];

    // Project configuration
    grunt.initConfig({
        meta: {
            banner:
            '/*!\n' +
                ' * Galore script.js\n' +
                ' * http://galoremag.com\n' +
                ' * MIT licensed\n' +
                ' *\n' +
                ' * Copyright (C) <%= grunt.template.today("yyyy") %> Benjamin Gleitzman, http://gleitzman.com\n' +
                ' */'
        },
        less: {
            production: {
                options: {
                    cleancss: true
                },
                files: {
                    'style/css/style.css': less_src_files
                }
            }
        },
        uglify: {
            options: {
                banner: '<%= meta.banner %>\n'
            },
            build: {
                src: js_src_files,
                dest: 'js/script-min.js'
            }
        },
        concurrent: {
            compress: ['uglify', 'less']
        },
        watch: {
            files: ['style/less/*.*',
                    'js/*.*',
                    '!style/css/style.css',
                    '!js/script-min.js'],
            tasks: ['less', 'uglify']
        }

    });

    // Dependencies
    grunt.loadNpmTasks('grunt-contrib-less');
    grunt.loadNpmTasks('grunt-contrib-cssmin');
    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-mocha-test');
    grunt.loadNpmTasks('grunt-nodemon');
    grunt.loadNpmTasks('grunt-concurrent');

    // Default tasks
    grunt.registerTask('default', ['watch']);
};
