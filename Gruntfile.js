module.exports = function(grunt) {

	grunt.initConfig({

		pkg: grunt.file.readJSON('package.json'),

		concat: {
			js: {
				src: ['http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js', 'js/bootstrap.min.js', 'js/messages.fr.js', 'js/parsley.min.js'],
				dest: 'js/prod/concat.js'
			},
			css: {
				src: ['css/bootstrap.min.css', 'css/bootstrap-responsive.min.css', 'css/app.css'],
				dest: 'css/prod/concat.css'
			}
		},

		uglify: {
			js: {
				src: 'js/prod/concat.js',
				dest: 'js/prod/main.min.js'
			}
		},

		cssmin: {
			minify: {
				src: ['css/prod/concat.css'],
				dest: 'css/prod/app.min.css'
			}
		}
		
	});

	grunt.loadNpmTasks('grunt-contrib');

	// Default task.
	grunt.registerTask('default', ['concat', 'uglify', 'cssmin']);

};