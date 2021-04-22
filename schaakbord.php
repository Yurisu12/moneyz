<HTML:5>
<head> 
  <title></title>

  </head>
  <body> 
  <h3>Schaakbord</h3>
   <table width="270px" cellspacing="0px" cellpadding="0px" border="1px">
   <?php
      for($row=1;$row<=8;$row++)
      {
          echo "<tr>";
          for($col=1;$col<=8;$col++)
          {
          $total=$row+$col;
          if($total%2==0)
          {
           echo "<td height=30px width=30px bgcolor=#000000></td>";
          }
          else
          {
            echo "<td height=30px width=30px bgcolor=#FFFFFF></td>";
          }
          }
          echo "</tr>";
    }
          ?>
  </table>
  </table>
  </body>

</HTML:5>