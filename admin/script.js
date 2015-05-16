// Userlist data array for filling in info box 
$(document).ready(function() {

    // Populate the user table on initial page load
    populateTable();

    //Change frontpage form
    $("#frontpage-form").submit(function() {
    $("#loading").show();
    var url = "../api/saveAnswer"; // the script where you handle the form input.

    $.ajax({
           type: "POST",
           url: url,
           data: $(this).serialize(), // serializes the form's elements.
           success: function(data)
           {
               $("#loading").hide();
               $("#loadingDone").show();
               populateTable();
               $("#frontpage-form")[0].reset();
	   }
         });

    return false; // avoid to execute the actual submit of the form.
});
    


});

// Functions =============================================================

// Fill table with data
function populateTable() {

    // Empty content string
    var tableContent = '';

    // jQuery AJAX call for JSON
    $.getJSON( '../api/questions', function( data ) {	
    	var i =0;
        // For each item in our JSON, add a table row and cells to the content string
        var totalUsers = data.length;
       $.each(data, function(){
            tableContent += '<tr>';
            tableContent += '<td>' + ++i + '</td>';
            tableContent += '<td>' + this.qContent + '</a></td>';
            tableContent += '<td><a class="doDeleteUser" href="../api/delete/'+this.qNumber+'"> Delete </a></td>';
            tableContent += '</tr>';
        });

        // Inject the whole content string into our existing HTML table
        $('#userList table tbody').html(tableContent);
        $('#totalUsers').html(totalUsers);

    });
};
// Delete users
$(document).on('click', ".doDeleteUser", function(e){

		//Delete    	
		
    	e.preventDefault();
    	$userEmail = $(this).attr('href');
    	$(this).parent().parent().slideUp("slow");
    	$.ajax({
                type: 'GET',
                url: $userEmail,
                success: function(result) {
                	populateTable();
                }
     	});   	
})
