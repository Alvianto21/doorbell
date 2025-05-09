const title = document.querySelector('#title');
const slug = document.querySelector('#slug');
	  
//Slug Automatic		
title.addEventListener('change', function() {
	fetch('/dashboard/posts/checkSlug?title=' + title.value)
		.then(response => response.json())
			.then(data => slug.value = data.slug)
});
	  
document.addEventListener('trix-file-accept', function(e) {
	e.preventDefault();
});
	  
//imange preview
function previewImage() {
	const image = document.querySelector('#image');
	const imgPreview = document.querySelector('.img-preview');
	  
	imgPreview.style.display = 'block';
	  
	const oFReader = new FileReader();
	oFReader.readAsDataURL(image.files[0]);
	  
	oFReader.onload = function(oFREvent) {
		imgPreview.src = oFREvent.target.result;
	};
}

//adminLTE file input
    jQuery(document).ready(function () {
      	bsCustomFileInput.init();
});