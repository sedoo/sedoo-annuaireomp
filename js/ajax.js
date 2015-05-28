// JavaScript Document

function listing(str)
{

if (str=="")
  {
  document.getElementById("txtHintFilter").innerHTML="";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("Filter").innerHTML=xmlhttp.responseText;
    }
//****
    //$(document).ready(function(){

/*
    * LOVELY THINGS
    */
    var options = {
      valueNames: [ 'name', 'description', 'category' ]
    };


// ACCORDION
    var allPanels = $('.accordion > .complement').hide();
    
    $('.accordion > .group-info > i').click(function() {
      $this = $(this);
      $target =  $this.parent().next();

      if(!$target.hasClass('active')){
         allPanels.removeClass('active').slideUp();
         $target.addClass('active').slideDown();
      }
    return false;
    });

    $(function(){
      $('#group').listnav({
      noMatchText: 'Aucune entrée pour cette lettre.',
      includeNums: false 
      });
    });

/********  BOOTSNIPP !! ********/
//$(document).ready(function() {
    var panels = $('.user-infos');
    var panelsButton = $('.dropdown-user');
    panels.hide();

    //Click dropdown
    panelsButton.click(function() {
        //get data-for attribute
        var dataFor = $(this).attr('data-for');
        var idFor = $(dataFor);

        //current button
        var currentButton = $(this);
        idFor.slideToggle(400, function() {
            //Completed slidetoggle
            if(idFor.is(':visible'))
            {
                currentButton.html('<i class="glyphicon glyphicon-chevron-up text-muted"></i>');
            }
            else
            {
                currentButton.html('<i class="glyphicon glyphicon-chevron-down text-muted"></i>');
            }
        })
    });


    $('[data-toggle="tooltip"]').tooltip();

    $('button').click(function(e) {
        e.preventDefault();
        alert("This is a demo.\n :-)");
    });
//});

/****************************/
    //});


//*****
  }
xmlhttp.open("GET","list.php?q="+str,true);
xmlhttp.send();
}


