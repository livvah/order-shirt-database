<?php

    include ('../adodb519/adodb5/adodb.inc.php');

    printTop();
    printModelForm();
    
    if (isset($_POST['color'])) {

        $color = $_POST['color'];
        print "<h3>You have selected color: $color </h3> \n";
        
        
    }
    if (isset($_POST['size'])) {

        $size = $_POST['size'];
        print "<h3>You have selected size: $size </h3> \n";
    }
    
    if(isset($_POST['name'])){
    
    	$name = $_POST['name'];
    	print "<h3> Hello $name, you have ordered a $size $color shirt </h3> \n";
    	
    }
    
    
    
    printBottom();
    
// -----------------------------------------------------------------    
// printForm() 
// Print the form to allow the  user to select a song to purchase
// -----------------------------------------------------------------    
function printModelForm() {
    
    
    
        // Open a connection to the database
        //
        $db = ADONewConnection('mysql'); // Create a connection handle to the local database
        $db->PConnect('localhost',  // Host to connect to
            'ovahsenc_phpUser',     // Database user name
                                   // (Password)
            'ovahsenc_cosc2328');   // Database
	
        // Format and execute a SQL statement
        //
        $rs = $db->Execute("select colorDesc from shirtColors");
        
        if ($rs == false) {
            print_r($_rs);
        }
        
        else {
            
            print 
                "<p><form action='finalExam.php' method='post'> \n" .
                "  <select style='width: 200px;' name='color' size='4'> \n" ;

        
            while (!$rs->EOF) {
                $colorDesc = $rs->fields['colorDesc'];
                print "    <option value='" . $colorDesc . "'>" . $colorDesc . "</option> \n";
                $rs->MoveNext();
            }
            print
                "  </select> \n" .
                "  <br><br> \n" ;
                               
        }
        
        $rs = $db->Execute("select sizeDesc from shirtSizes");
        
        if ($rs == false) {
            print_r($_rs);
        }
        
        else {
            
            print 
                "  <select style='width: 200px;' name='size' size='4'> \n" ;

        
            while (!$rs->EOF) {
                $sizeDesc = $rs->fields['sizeDesc'];
                print "    <option value='" . $sizeDesc . "'>" . $sizeDesc . "</option> \n";
                $rs->MoveNext();
            }
            print
                "  </select> \n" .
                "  <br><br> \n" .
                "    <table> \n".
		"     <tr> \n" .
		"       <td>Name:</td><td> <input type='text' name = 'name' maxlength='20'></td>\n" .
		"     </tr> \n" .
		"    </table>" .
                "  <input type='submit'> \n".
                "</form> \n";                
        }
}

// -----------------------------------------------------------------    
// printTop() 
// Print the top of the web page
// -----------------------------------------------------------------        
function printTop() {

    print     
    " <!DOCTYPE html> \n" .
    " <html lang='en'>  \n" .
    "   <head>  \n" .
    "     <meta charset='utf-8'>  \n" .
    "     <title>Shirt Order</title>  \n" .
    "  \n" .
    "     <!-- Latest compiled and minified CSS -->  \n" .
    " 	<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css'>  \n" .
    "  \n" .
    " 	<!-- Optional theme -->  \n" .
    " 	<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css'>  \n" .
    "  \n" .
    " 	<!-- Latest compiled and minified JavaScript -->  \n" .
    " 	<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js'></script>  \n" .
    "     \n" .
    "  </head>  \n" .
    "  \n" .
    "  \n" .
    " <body>   \n" .
    "     <div class='container'>  \n" .
    "         <div class='row'>  \n" .
    "             <div class='col-md-10 col-md-offset-1'>     \n".
    "                   <h1>Select Shirt </h1> \n";
}    

// -----------------------------------------------------------------    
// printBottom()
// Print the bottom of the web page
// -----------------------------------------------------------------        
function printBottom() {    
    
print

    "            </div> \n".
    "       </div> \n".
    "   </div> \n" .
    "  </body> \n".
    "</html> \n";
}

?>  
