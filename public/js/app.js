$(function () {
   $('.hamburger').on('click', function (e) {
      $('.wrapper').toggleClass('collapsed');
      $('.overlay').toggle();
   });

   setTimeout(function () {
      $('p.message').fadeOut();
   }, 5000);


   // ajax

   (function(){
      var userNameField = document.querySelector('input[name=UserName]');
      if(null !== userNameField){
         userNameField.addEventListener('blur' , function(){
            var request = new XMLHttpRequest();
            request.open('POST' , 'http://www.apptest.com/users/checkuserExistajax');
            request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

            request.onreadystatechange = function()
            {
               var iElement = document.createElement('i');
               if(request.readyState == request.DONE && request.status == 200){
                  if(request.response == 1){
                     iElement.className= 'fa fa-times error';
                  }else if(request.response == 2 ){
                     iElement.className= 'fa fa-check success';
                  }

                  //looping on i in parent
                  var iElements = userNameField.parentNode.childNodes;
                  for (let i = 0; i < iElements.length; i++) {
                     if(iElements[i].nodeName.toLowerCase() == 'i'){
                        iElements[i].parentNode.removeChild(iElements[i])
                     }
                  }
                  userNameField.parentNode.appendChild(iElement);
               }
            }
            request.send("UserName=" + this.value)
         }, false);
      }
   })();
});