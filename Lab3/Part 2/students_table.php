<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Status</th>
        </tr>
    </thead>

    <tbody>

    <?php 
        foreach ($students as $student) {
            if($student['status'] == 'PHP') {
                echo '<tr style="color:red;">';
            }
            else {
                echo '<tr>';
            }
            foreach($student as $val) {
                echo '<td>' . $val . '</td>';
            }
            echo '</tr>';
        } 
    
    ?>
    </tbody>

</table>