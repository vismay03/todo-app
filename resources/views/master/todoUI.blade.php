 
 <link rel="stylesheet" href="css/todoui.css">

    @extends('master.header')

    @section('todo')
    
    <div class="container">
        <h3>Create Task</h3>
        
        <div class="section">
                <input type="text" class="in">
            <input class='addbtn' type="submit" value="add"/>
                <ul>
                </ul>
        </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.5.0.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
    
    <script>
    
    $(document).ready(function(){

    /** AFTER CLICK ADD BUTTON **/ 
    
    
    $('.container .section .addbtn').click(function(e){

    var str = $('.container .section .in').val();

    /** CHECK IF STRING EMPTY OR NOT THEN ADD**/
    if ( str.trim() == "" ){
        alert('Add Task...');
        return false;
    }
    else {
      
        $('.container .section ul').prepend('<li><img  src="Image/doneBlack.svg" /> <p>' + str + '</p> <div class="icon" > <img class="edit" src="Image/edit.svg" alt="edit"><img class="delete" src="Image/delete.svg" alt="delete"></div></li>');
        $('.container .section .in').val('') ;
    }




    //TASK DONE
    var list = document.querySelector('img');
list.addEventListener('click', function(e) {
  if (e.target.tagName === 'IMG') {
    $to =  e.target.nextElementSibling.classList.toggle('deleted');
    if($to){
        e.target.setAttribute('src','Image/doneBlue.svg')
    }
    else{
        e.target.setAttribute('src','Image/doneBlack.svg')
    }
  }
}, false);


// console.log('Out');

//         if ($(this).hasClass('doneBlack')){
//             e.target.nextElementSibling.setAttribute('class','deleted');
//             e.target.setAttribute('class','doneBlue')
//             console.log('deleted');
            
//         } 
//         else{
//             e.target.nextElementSibling.removeAttribute('class','deleted');
//             e.target.setAttribute('class','doneBlack')
//         }
  
            // if(e.target.nextElementSibling.hasAttribute('class','deleted')) {
            //     //e.target.setAttribute('class', 'doneBlue')
            //     e.target.setAttribute('src','Image/doneBlue.svg')
            //     e.target.nextElementSibling.removeAttribute('class','deleted');
            //     console.log('blue');
                
            // }
            // else{
            //    // e.target.setAttribute('class', 'doneBlack')
            //     e.target.setAttribute('src','Image/doneBlack.svg')
            //     e.target.nextElementSibling.setAttribute('class','deleted');
            //     console.log('black');

            // }

   

    /** DELETE TASK **/
    $('.container .section ul li .icon img.delete').click(function(e) {
        e.target.parentElement.parentElement.remove()
        console.log('In delete');
        
    });

    /** EDIT TASK **/
    $('.container .section ul li .icon img.edit').click(function(e) { 
        
        
        var newInput = $("<input type='text' value='' autofocus>")
        newInput.replaceAll(e.target.parentElement.previousElementSibling);
        
        e.target.parentElement.previousElementSibling.addEventListener('focusout', taskEdit );
       

    
        function taskEdit() {
                var editStr = $('.container .section ul li input').val();
                    var newParagraph = $('<p>'+ editStr +'</p>')
                    newParagraph.replaceAll(e.target.parentElement.previousElementSibling);
                }
            });
        });
    });
    
    </script>   
       

    @endsection


   

  