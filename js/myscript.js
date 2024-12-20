$('.numonly').keypress(function(e) {
          var a = [];
          var k = e.which;
          if(k==13){
          }else{
          for (i = 48; i < 58; i++)

              a.push(i);
          if (!(a.indexOf(k)>=0) && !(a.indexOf(k)==13))
              e.preventDefault();
          }
        });
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
   var input = this;
    var url = $(this).val();
    var parent = $(this).parent('div').parent('div').prev('img');
    var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
    if (input.files && input.files[0]&& (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg")) 
     {
        var reader = new FileReader();

        reader.onload = function (e) {
           parent.attr('src', e.target.result);
        }
       reader.readAsDataURL(input.files[0]);
    }
});
function resetform(argument) {
      $('.custom-file').prev('img').attr('src',"<?php echo base_url();?>assets/images/no-image.jpg");
      $('.custom-file label').html('Choose File');
    }
    
$("#gallery").on("change", function() {
     var preview = document.querySelector('.imgpreview');
  
  if (this.files) {
    [].forEach.call(this.files, readAndPreview);
  }

  function readAndPreview(file) {

    // Make sure `file.name` matches our extensions criteria
    if (!/\.(jpe?g|png|gif)$/i.test(file.name)) {
      return alert(file.name + " is not an image");
    } // else...
    
    var reader = new FileReader();
    
    reader.addEventListener("load", function() {
        var x='<div class="col-lg-6">\
        <div class="imgcontainer">\
        <img src="'+this.result+'" class="proimage" style="width:100%;min-height:80px; margin-bottom: 10px;">\
                          </div>\
                         </div>';
      $('.imgpreview').append(x);
    });
    
    reader.readAsDataURL(file);
    
  }
});
$(document).ready(function () {
  /* Higlight active sidebar menu */
  var url = window.location;
  // Will only work if string in href matches with location
  $('ul.nav-sidebar li a[href="' + url + '"]').addClass('active');

  // Will also work for relative and absolute hrefs
  $('ul.nav-sidebar li a').filter(function () {
    return this.href == url;
  }).parent().parent().parent().addClass('menu-open').children("a").addClass('active');

  /* Higlight active main menu */
  var url = window.location;
  // Will only work if string in href matches with location
  $('ul.navbar-nav li a[href="' + url + '"]').parent('a').addClass('active');

  // Will also work for relative and absolute hrefs
  $('ul.navbar-nav li a').filter(function () {
    return this.href == url;
  }).parent().addClass('active').parent().parent('a').addClass('active');
});