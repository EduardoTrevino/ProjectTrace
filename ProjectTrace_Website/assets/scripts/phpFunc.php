<?php
    function PrintAgencies() {
        echo '<form action="" method="post">';
        echo '<div class="LSDM_Projects_List">';
        echo '<p> # </p><p> Organization </p><p> Organization Full Name </p>';
        echo '<p></p>';
        echo '<p> - </p><p> TEST </p><p> TEST </p>';
        echo '<button type="submit" name="TEST" value="TEST"> > </button>';
        echo '<p> 1 </p><p> DOE </p><p> Department of Energy </p>';
        echo '<button type="submit" name="doe" value="doe"> > </button>';
        echo '<p> 2 </p><p> NIH </p><p> National Institutes of Health </p>';
        echo '<button type="submit" name="nih" value="nih"> > </button>';
        echo '<p> 3 </p><p> NSF </p><p> National Sanitation Foundation </p>';
        echo '<button type="submit" name="nsf" value="nsf"> > </button>';
        echo '</div>';
        echo '</form>';
    }

    function PrintProjects($agency) {
        // Data Sanitization
        $agency=addslashes($agency);

        // Fetch information from database
        $dblink=new mysqli(/*host, user, password, database*/);
        $sql="SELECT * FROM `$agency`";
        $results=$dblink->query($sql) or die('ERROR: Database query failed.');
        $count=1;

        echo '<form action="" method="post">';
        echo '<button type="submit" name="" value=""> < Back </button>';
        echo '<div class="LSDM_Projects_List">';

        while ($data=$results->fetch_array(MYSQLI_NUM)) {
            echo '<p> '.$count++.' </p>';
            echo '<p> '.$data[2].' </p>';
            echo '<p> '.$data[1].' </p>';
            echo '<button type="submit" name="'.$agency.'" value="'.$data[0].'"> > </button>';
        }

        echo '</div>';
        echo '<button type="submit" name="" value=""> < Back </button>';
        echo '</form>';
    }

    function PrintAward($agency, $award) {
        // Data sanitization
        $agency=addslashes($agency);
        $award=addslashes($award);

        // Fetch information from database
        $dblink=new mysqli(/*host, user, password, database*/);
        $sql='SELECT * FROM '.$agency.' WHERE award_number=\''.$award.'\'';
        $results=$dblink->query($sql) or die('ERROR: Database query failed.');

        while ($data=$results->fetch_array(MYSQLI_NUM)) {
            
            // Print Project Information
            echo '<form action="" method="post">';
            echo '<button type="submit" name="'.$agency.'" value="'.$agency.'"> < Back </button>';
            echo '<p> Award Number: '.$data[0].' </p>';
            echo '<h3> '.$data[1].' </h3>';
            echo '<p> Funding Agency: '.$data[2].' </p>';
            echo '<p> Contact: '.$data[3].' | '.$data[4].' </p>';
            echo '<p> '.$data[5].' </p>';
            echo '<p> '.$data[7].' </p>';

            // Display images associated with project
            $imageDir='/var/www/html/assets/images/'.preg_replace("/[^A-Za-z0-9 ]/", '', $data[1]).'/';

            if (is_dir($imageDir)) {
                echo '<p><div class="LSDM_Images_Grid">';
                foreach (array_diff(scandir($imageDir), ['.', '..']) as $image) {
                    echo '<img src="/assets/images/'.preg_replace("/[^A-Za-z0-9 ]/", '', $data[1]).'/'.$image.'" class="LSDM_Images_Content">';
                }
                echo '</div></p>';
            }

            echo '<button type="submit" name="'.$agency.'" value="'.$agency.'"> < Back </button>';
            echo '</form>';
        }
    }
?>
