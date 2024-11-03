$(document).ready(function(){

    console.log('holllla');
  	
    $('#example').DataTable();

    $('.btn-ikut-partisipasi').click(function(e) {
        e.preventDefault();

      let form = $(this).closest('form');

      swal({
         title: 'Peringatan',
         text: 'Jika anda ingin membatalkan partisipasi kegiatan maka harus menghubungi admin!',
         icon: 'warning',
         buttons: true,
         dangerMode: false,
      })
         // jika btn ok di klik : 
         .then((willdelete) => {
            if (willdelete) {
               form.submit();
            }
         })
    })

}); 

function previewImage() {
   const image = document.querySelector('#image');

   const imgPreview = document.querySelector('#img-preview');

   imgPreview.style.display = 'block';

   const oFReader = new FileReader();
   oFReader.readAsDataURL(image.files[0]);
   oFReader.onload = function(oFREvent) {
       imgPreview.src = oFREvent.target.result;
   }

}

function previewBanner1() {
   const image = document.querySelector('#inputBanner1');

   const imgPreview = document.querySelector('#img-banner1');

   imgPreview.style.display = 'block';

   const oFReader = new FileReader();
   oFReader.readAsDataURL(image.files[0]);
   oFReader.onload = function(oFREvent) {
       imgPreview.src = oFREvent.target.result;
   }
}

function previewBanner2() {
   const image = document.querySelector('#inputBanner2');

   const imgPreview = document.querySelector('#img-banner2');

   imgPreview.style.display = 'block';

   const oFReader = new FileReader();
   oFReader.readAsDataURL(image.files[0]);
   oFReader.onload = function(oFREvent) {
       imgPreview.src = oFREvent.target.result;
   }
}

function previewBanner3() {
   const image = document.querySelector('#inputBanner3');

   const imgPreview = document.querySelector('#img-banner3');

   imgPreview.style.display = 'block';

   const oFReader = new FileReader();
   oFReader.readAsDataURL(image.files[0]);
   oFReader.onload = function(oFREvent) {
       imgPreview.src = oFREvent.target.result;
   }
}

function previewProfile() {
   const image = document.querySelector('#inputProfile');

   const imgPreview = document.querySelector('#img-profile');

   imgPreview.style.display = 'block';

   const oFReader = new FileReader();
   oFReader.readAsDataURL(image.files[0]);
   oFReader.onload = function(oFREvent) {
       imgPreview.src = oFREvent.target.result;
   }
}

function previewStruktur() {
   const image = document.querySelector('#inputStruktur');

   const imgPreview = document.querySelector('#img-struktur');

   imgPreview.style.display = 'block';

   const oFReader = new FileReader();
   oFReader.readAsDataURL(image.files[0]);
   oFReader.onload = function(oFREvent) {
       imgPreview.src = oFREvent.target.result;
   }
}