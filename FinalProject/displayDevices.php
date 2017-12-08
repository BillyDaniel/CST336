<?php
        include '../dbConnection.php';
        $conn = getDatabaseConnection(final_project); 
        global $conn;
        $namedParameters = array();
                $sql = "SELECT * 
                FROM devices WHERE 1";
                if($_POST['filter']!="-Select One-"){
                    $sql .= " AND type = :filter";
                    $namedParameters[':filter'] = $_POST['filter'];
                }
                if($_POST['search']!=""){
                    $sql .= " AND dName LIKE :search";
                    $namedParameters[':search'] = "%". $_POST['search']."%";
                }
                $sql .=" ORDER BY id";
            $statement = $conn->prepare($sql);
            $statement->execute($namedParameters);
            $devices = $statement->fetchAll(PDO::FETCH_ASSOC);

        
        
        
        $some="";
        if(isset($_GET['ad'])){
            if($_GET['ad']==0){
            $some.= "<table class='table'> 
                    <tr>
                    <th>Device</th>
                    <th>Price</th>
                    <th>Stock</th>
                </tr>";
        
            foreach($devices as $d) {
            
                $some.= "<tr>
                    <td><a target='deviceData' href='deviceData.php?id=".$d['id']."'> ".$d['dName'] . "</th>
                    <td>$" . $d['price']."</th>
                    <td>". $d['stock']."</th>
                </tr>";
                }
            $some.= "</table>";
            echo $some;
            }
        else{
            $some.= "<table class='table'> 
                <tr>
                    <th>Device</th>
                    <th>Price</th>
                    <th>Stock</th>
                </tr>";
        
        foreach($devices as $d) {
            
            $some.= "<tr>
                    <td><a target='deviceData' href='adminDeviceData.php?id=".$d['id']."'> ".$d['dName'] . "</th>
                    <td>$" . $d['price']."</th>
                    <td>". $d['stock']."</th>
                    <td>
                    <form action='updateDevice.php' style='display:inline'>
                        <input type='hidden' name='id' value='".$d['id']."'/>
                        <input class='btn btn-info' type='submit' value='Edit'>
                    </form>

                    </th>
                    <td>
                    <form action='deleteDevice.php' style='display:inline'>
                    <input type='hidden' name='id' value='".$d['id']."'/>
                    <input class='btn btn-danger' type='submit' value='Delete'>
                  </form>

                    </th>
            </tr>";
        }
        $some.= "</table>";
        echo $some;
    }
}
        
?>