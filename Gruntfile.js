module.exports = function(grunt) {

	grunt.initConfig({

		pkg: grunt.file.readJSON('package.json'),

		concat: {
			js: {
				src: ['js/bootstrap.min.js', 'js/messages.fr.js', 'js/parsley.min.js', 'js/app.js'],
				dest: 'js/concat.js'
			},
			css: {
				src: ['css/bootstrap.min.css', 'css/bootstrap-responsive.min.css', 'css/app.css'],
				dest: 'css/concat.css'
			}
		},

		uglify: {
			js: {
				src: 'js/concat.js',
				dest: 'js/app.min.js'
			}
		},

		cssmin: {
			minify: {
				src: 'css/concat.css',
				dest: 'css/app.min.css'
			}
		}
		
	});

	grunt.loadNpmTasks('grunt-contrib');

	// Default task.
	grunt.registerTask('default', ['concat', 'uglify', 'cssmin']);

};