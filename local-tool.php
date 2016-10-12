<html lang = "en">   
<head>
   <title>Local Tool (Anti-Hunter)</title>     
</head>

<body>
   
   <h2>Local Scout Tool</h2> 
      
   <?php
      $msg = '';
      $outputCode = '';
      $rawArray = '';
      
      if (isset($_POST['parseInput']) && !empty($_POST['localInput'])) {

         // Array declarations
         $inputArray = array();
         
         $inputRaw = isset($_POST['localInput'])?$_POST['localInput']:"";
         if ( strlen( $inputRaw ) == 0 ) {
           exit;
         }

         // delimit text area into array
         $rawArray = explode("\n", str_replace("\r", "", $inputRaw));
       

         // Load item array
         // ======================================================================================================
         // ================================= PLACE YOUR JSON FILE LOCATION HERE =================================
         // ======================================================================================================
         $json = file_get_contents("XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXxx");
         $json = json_decode($json, true);

         unset($_POST['parseInput']);
         unset($_POST['localInput']);

         $cleanedArray = array_filter($rawArray);

         // Begin parsing raw array
         foreach ( $cleanedArray as $str ) {
            foreach ( $json as $alliance => $allKey) {
               foreach ( $allKey["hunters"] as $hunter => $hunterKey) {
                  if ( $hunterKey["name"] == $str ) {
                     array_push($inputArray, array("type" => "hunter", "alliance" => $alliance, "name" => $hunterKey["name"], "notes" => $hunterKey["notes"]) );
                     break;
                  }
               }
               foreach ( $allKey["eyes"] as $eyes => $eyesKey) {
                  if ( $eyesKey["name"] == $str ) {
                     array_push($inputArray, array("type" => "eyes", "alliance" => $alliance, "name" => $eyesKey["name"], "notes" => $eyesKey["notes"]) );
                     break;
                  }
               }
            }
         }

         // Create Table code
         $outputCode .= "<tr>";        
         $outputCode .= "<td>Type</td>";
         $outputCode .= "<td>Alliance</td>";
         $outputCode .= "<td>Name</td>";
         $outputCode .= "<td>Notes</td>";
         $outputCode .= "</tr>";

         foreach ( $inputArray as $enemyKey => $enemy ) {
            $outputCode .= "<tr>";        
            $outputCode .= "<td>" . $enemy["type"]       . "</td>";
            $outputCode .= "<td>" . $enemy["alliance"]   . "</td>";
            $outputCode .= "<td>" . $enemy["name"]       . "</td>";
            $outputCode .= "<td>" . $enemy["notes"]      . "</td>";
            $outputCode .= "</tr>";
         }
      }
   ?>
   
   <form role = "form" 
      action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']); 
      ?>" method = "post">

      <h4><?php echo $msg; ?></h4>

      <label>Local Tool:</label> 
      <br />
      <textarea name = "localInput" cols="70" rows="20" placeholder = "Paste Local Contents Here" required autofocus></textarea>
      <br />
      <button type = "submit" name = "parseInput">Submit</button>
   </form>

   <table><?php echo $outputCode; ?></table>
</body>
</html>