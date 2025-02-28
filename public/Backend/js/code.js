$(function(){
  $(document).on('click','#delete',function(e){
      e.preventDefault();
      var link = $(this).attr("href");


                Swal.fire({
                  title: 'Are you sure you want to Delete This Data?',
                  text: "Once Deleted, You will not be able to Undo !",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                  if (result.isConfirmed) {
                    window.location.href = link
                    Swal.fire(
                      'Deleted!',
                      'Your file has been deleted.',
                      'success'
                    )
                  }
                }) 


  });

});


// Confirm 

$(function(){
  $(document).on('click','#returned',function(e){
      e.preventDefault();
      var link = $(this).attr("href");


                Swal.fire({
                  title: 'Return This Book!',
                  text: "Once Returned, You will not be able to Undo Returned",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Yes, Return Book!'
                }).then((result) => {
                  if (result.isConfirmed) {
                    window.location.href = link
                    Swal.fire(
                      'Confirm!',
                      'Confirm Changes',
                      'success'
                    )
                  }
                }) 


  });

});








$(function(){
  $(document).on('click','#returnedless',function(e){
      e.preventDefault();
      var link = $(this).attr("href");


                Swal.fire({
                  title: 'Less Books Returned!',
                  text: "Once Submitted, You will not be able to Undo Action!",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Yes, Submit Request!'
                }).then((result) => {
                  if (result.isConfirmed) {
                    window.location.href = link
                    Swal.fire(
                      'Confirm!',
                      'Confirm Changes',
                      'success'
                    )
                  }
                }) 


  });

});










$(function(){
  $(document).on('click','#damagedbooks',function(e){
      e.preventDefault();
      var link = $(this).attr("href");


                Swal.fire({
                  title: 'Damaged Books Returned!',
                  text: "Once Submitted, You will not be able to Undo Action!",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Yes, Submit Request!'
                }).then((result) => {
                  if (result.isConfirmed) {
                    window.location.href = link
                    Swal.fire(
                      'Confirm!',
                      'Confirm Changes',
                      'success'
                    )
                  }
                }) 


  });

});





$(function(){
  $(document).on('click','#not_damaged',function(e){
      e.preventDefault();
      var link = $(this).attr("href");


                Swal.fire({
                  title: 'Submit The Books Not Damaged!',
                  text: "Once Returned, You will not be able to Undo Returned",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Yes, Return Book!'
                }).then((result) => {
                  if (result.isConfirmed) {
                    window.location.href = link
                    Swal.fire(
                      'Confirm!',
                      'Confirm Changes',
                      'success'
                    )
                  }
                }) 


  });

});










$(function(){
  $(document).on('click','#less_returned',function(e){
      e.preventDefault();
      var link = $(this).attr("href");


                Swal.fire({
                  title: 'Submit The Books Returned!',
                  text: "Once Returned, You will not be able to Undo Returned",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Yes, Return Book!'
                }).then((result) => {
                  if (result.isConfirmed) {
                    window.location.href = link
                    Swal.fire(
                      'Confirm!',
                      'Confirm Changes',
                      'success'
                    )
                  }
                }) 


  });

});






$(function(){
  $(document).on('click','#books_recovered',function(e){
      e.preventDefault();
      var link = $(this).attr("href");


                Swal.fire({
                  title: 'Submit The Books Recovered!',
                  text: "Once Returned, You will not be able to Undo Returned",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Yes, Return Recovered Book!'
                }).then((result) => {
                  if (result.isConfirmed) {
                    window.location.href = link
                    Swal.fire(
                      'Confirm!',
                      'Confirm Changes',
                      'success'
                    )
                  }
                }) 


  });

});
















// medic

$(function(){
  $(document).on('click','#medic',function(e){
      e.preventDefault();
      var link = $(this).attr("href");


                Swal.fire({
                  title: 'Was Dosage Completed?',
                  text: "Once Clicked, You will not be able to Undo",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Yes, Dosage Completed!'
                }).then((result) => {
                  if (result.isConfirmed) {
                    window.location.href = link
                    Swal.fire(
                      'Processing!',
                      'Processing Changes',
                      'success'
                    )
                  }
                }) 


  });

});




// Admissions 

$(function(){
  $(document).on('click','#admit',function(e){
      e.preventDefault();
      var link = $(this).attr("href");


                Swal.fire({
                  title: 'Do you Want to Admit Student?',
                  text: "Once Clicked, You will not be able to Undo",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Yes, Admit Student!'
                }).then((result) => {
                  if (result.isConfirmed) {
                    window.location.href = link
                    Swal.fire(
                      'Processing!',
                      'Processing Changes',
                      'success'
                    )
                  }
                }) 


  });

});






$(function(){
  $(document).on('click','#activate',function(e){
      e.preventDefault();
      var link = $(this).attr("href");


                Swal.fire({
                  title: 'Are you sure you want to Activate This User?',
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Yes, Activate User Status!'
                }).then((result) => {
                  if (result.isConfirmed) {
                    window.location.href = link
                    Swal.fire(
                      'Activated!',
                      'User Account Has Been Activated.',
                      'success'
                    )
                  }
                }) 


  });

});







$(function(){ 
  $(document).on('click','#deactivate',function(e){
      e.preventDefault();
      var link = $(this).attr("href");


                Swal.fire({
                  title: 'Are you sure you want to Deactivate This User?',
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Yes, Deactivate User Status!'
                }).then((result) => {
                  if (result.isConfirmed) {
                    window.location.href = link
                    Swal.fire(
                      'Activated!',
                      'User Account Has Been Deactivated.',
                      'success'
                    )
                  }
                }) 


  });

});

