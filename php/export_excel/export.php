

<?php  
//export.php  
$connect = mysqli_connect("127.0.0.1", "root", "1334", "technical_services");
$output = '';
if(isset($_POST["export"]))
{
 $query = "SELECT * FROM tx_records";
 $result = mysqli_query($connect, $query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
   <table class="table" bordered="1">  
                    <tr>  
                         <th>Transmission Id</th>  
                         <th>Date</th>  
                         <th>Engineers Name</th>
                         <th>Transmitter Location</th>  
                         <th>Address</th>  
                         <th>Signal Reception</th>
                         <th>Signal Transmission</th>  
                         <th>Services</th>  
                         <th>Mains</th>  
                         <th>Description</th>
                    </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
    <tr>  
                         <td>'.$row["tx_id"].'</td>  
                         <td>'.$row["date_now"].'</td>  
                         <td>'.$row["engineer_name"].'</td>  
                         <td>'.$row["location"].'</td>  
                         <td>'.$row["signal_reception"].'</td>  
                         <td>'.$row["signal_transmission"].'</td>  
                         <td>'.$row["services"].'</td>  
                         <td>'.$row["mains"].'</td>  
                         <td>'.$row["message"].'</td>
                            </tr>
   ';
  }
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=Transmission.xls');
  echo $output;
 }
}
?>

