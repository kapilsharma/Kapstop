(function($, $w, $d, undefined) {
	//KapsKernel class.
	var KapsKernel = {
		//Initialization. Ideally constructor in OO terms. Needs to be run only once.
		init: function(options, elem){
			var self = this;
			self.elem=elem;
			self.$elem=$(elem);
			
			self.options=$.extend({}, $.fn.kernel.options, options);
			
			//destroy body, if present
			$('body').html('');
			
			//Set window's height, width, title
			self.setWindow();
			
			//Start the kapstop
			self.start();
		},
		
		/**
		 * Set window.
		 * Use this function to setup all window height, width etc.
		 */
		setWindow: function(){
		},
		start: function(){
			var self = this;
			self.$kkvar_cont = $("<div></div>").attr('id','kt-container').addClass('kt-fullscreenlayer').css('z-index','100').appendTo(self.$elem);
			
			//Load OS Script and initializa it.
			$.getScript('/script/kapstop.kapsos.js',function(){
				self.$kkvar_cont.kapsos();
			});
		}
	}
	$.fn.kernel = function(options) {
		//JQuery good practice. Kernel's constructor with throw error.
		return this.each(function() {
			//Create an instance of KapsKernel
			var $kk = Object.create(KapsKernel);
			
			//Initialize kernel
			$kk.init (options, this);
			
			//Save kernel instance for other script, if needed.
			$.data(this,'kapsKernel',$kk);
		});
	};
	$.fn.kernel.options = {
		width:  600,
		height: 480,
		title:  'KapsTop'
	};
})(jQuery, window, document);