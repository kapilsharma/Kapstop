//Heck for Opera/old browsers, which do not have build-in Object.create function.
if(typeof Object.create !== 'function'){
	Object.create = function(obj){
		function F(){};
		F.prototype = obj;
		return new F();
	}
}

function getKapsKernel(){
	return $.data($("body")[0],'kapsKernel');
}
