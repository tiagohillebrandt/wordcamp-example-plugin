module.exports = function(grunt) {
  grunt.initConfig({
    // JS linting
    jshint: {
      options: grunt.file.readJSON('.jshintrc'),
      files: ['Gruntfile.js', 'assets/*.js', '!assets/*.min.js']
    },

    // build zip file
    compress: {
      main: {
        options: {
          archive: 'wordcamp-example-plugin.zip'
        },
        files: [{
          expand: true,
          src: [
            'languages/**',
            'includes/**',
            'views/**',
            'readme.txt',
            'index.php',
            'wordcamp-example-plugin.php'
          ],
          dest: 'wordcamp-example-plugin/'
        }]
      }
    },

    // i18n: generate POT file
    makepot: {
      main: {
        options: {
          domainPath: 'languages',
          potFilename: 'wordpress-example-plugin.pot',
          type: 'wp-plugin'
        }
      }
    },

    // run shell commands
    shell: {
      phpcs: {
        command: 'vendor/bin/phpcs'
      }
    }
  });

  grunt.loadNpmTasks('grunt-contrib-compress');
  grunt.loadNpmTasks('grunt-contrib-jshint');
  grunt.loadNpmTasks('grunt-shell');
  grunt.loadNpmTasks('grunt-wp-i18n');

  grunt.registerTask('default', ['jshint', 'shell:phpcs']);
  grunt.registerTask('build', ['default', 'compress:main']);
  grunt.registerTask('i18n', ['makepot:main']);
};
