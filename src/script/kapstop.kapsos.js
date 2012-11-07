(function($, $w, $d, undefined) {
	//KapsOs class
	var KapsOs = {
		init: function(options, elem){
			var self = this;
			self.elem=elem;
			self.$elem=$(elem);
			
			self.options=$.extend({}, $.fn.kapsos.options, options);
			
			self.kosstatus="Initializing KapsOS";
			
			//Get a reference of kernel object.
			self.$kk=getKapsKernel();
			
			//Create System Registry
			self.createRegistry();
			
			//Creating layers
			self.createOSLayers();
			
			//Create Taskbar. Change this function to change design of taskbar
			self.createTaskBar();
			
			//get installed apps
			self.installedApps = self.getInstalledApps();
		},
		setStatus: function(status){
			var self = this;
			self.kosstatus=status;
		},
		createRegistry: function(){
			var self = this;
			
			self.setStatus("Initializing registry");
			
			//Base registry object
			self.registry = new Object;
			
			//Registry entries for Apps
			self.registry.apps = new Object;
		},
		registerApp: function(name,object){
			if(typeof self.registry.apps.name !== 'object'){
				self.registry.apps.name = object;
			}else{
				return false;
			}
		},
		createOSLayers: function(){
			var self = this;
			
			/***********************/
			/*   Creating layers   */
			/***********************/
			//Desktop layer.
			self.layer_desktop=$("<div></div>").attr("id","kos-layer-desktop").addClass('kt-fullscreenlayer').css('z-index','150').appendTo(self.$kk.$kkvar_cont);
			
			//TODO: Create statusbar layer
			
			//TODO: Create window layer
			
			//TODO: Create Model-window layer
			
			//TODO: Create alerts layer
			
			//TODO: Create OSMessage layer
			self.layer_osmessage=$("<div></div>").attr("id","kos-layer-osmsg").addClass('kt-fullscreenlayer').css('z-index','800').appendTo(self.$kk.$kkvar_cont);
		},
		createTaskBar: function(){
			var self = this;
			
			self.taskbar = $("<div></div>").attr("id","kos-taskbar-small").appendTo(self.layer_osmessage);
		},
		getInstalledApps: function(){
			var self = this;
			
			$.getJSON($KT_WEBAPP_URL+"getapps.php",
				{
					t: "insapp"
				},
				function(data){
					console.log(data);
					$.each(data, function(i,item){
						console.log(i+",",item);
					});
				}
			);
		}
	}
	$.fn.kapsos = function(options) {
		return this.each(function() {
			var $kos = Object.create(KapsOs);
			
			//Initialize kos
			$kos.init (options, this);
			
			//Save kos instance for other script, if needed.
			$.data(this,'kapsKos',$kos);
		});
	};
	$.fn.kapsos.options = {
	};
})(jQuery, window, document);