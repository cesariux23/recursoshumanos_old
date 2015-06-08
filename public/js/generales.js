/*
##################################################
javascript normal :P
*/

//asignacion del timepicker
$('.input-group.date').datepicker({
	language: "es",
	autoclose: true,
	todayHighlight: true,
	format: "yyyy/mm/dd"
});

//carga de foto
$('#files').on('change',function (evt) {
var files = evt.target.files; // FileList object
// Loop through the FileList and render image files as thumbnails.
for (var i = 0, f; f = files[i]; i++) {
// Only process image files.
if (!f.type.match('image.*')) {
	continue;
}
var reader = new FileReader();
// Closure to capture the file information.
reader.onload = (function(theFile) {
	return function(e) {
		$('#foto').attr('src',e.target.result);
	};
})(f);
// Read in the image file as a data URL.
reader.readAsDataURL(f);
}
});

$('.mayus').on('input', function(evt) {
	$(this).val(function (_, val) {
		return val.toUpperCase();
	});
});

$(document).on("keydown", function (e) {
	if (e.which === 8 && !$(e.target).is("input, textarea")) {
		e.preventDefault();
	}
});

$(window).load(function(){
	$('#cover').fadeOut(100);
});

//valida la clave de un campo clave valor

$(".txt").on("focusout", function () {
	opcion=$('#id'+this.id+' option:selected').html();
	if(opcion.length==0){
		alert('Ingrese una clave valida');
		this.value=""
		angular.element(this).triggerHandler('input')
	}
});
