<?php
    function PrintAgencies() {
        echo '<form action="" method="post">';
        echo '<div class="LSDM_Projects_List">';
        echo '<p> # </p>';
        echo '<p> Organization </p>';
        echo '<p> Organization Full Name </p>';
        echo '<p></p>';
        echo '<p> 1 </p>';
        echo '<p> DOE </p>';
        echo '<p> Department of Education </p>';
        echo '<button type="submit" name="doe" value="doe"> > </button>';
        echo '<p> 2 </p>';
        echo '<p> NIH </p>';
        echo '<p> National Institutes of Health </p>';
        echo '<button type="submit" name="nih" value="nih"> > </button>';
        echo '<p> 3 </p>';
        echo '<p> NSF </p>';
        echo '<p> National Sanitation Foundation </p>';
        echo '<button type="submit" name="nsf" value="nsf"> > </button>';
        echo '</div>';
        echo '</form>';
    }

    function PrintProjects($agency) {
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
        $dblink=new mysqli(/*host, user, password, database*/);
        $sql='SELECT * FROM '.$agency.' WHERE award_number=\''.$award.'\'';
        $results=$dblink->query($sql) or die('ERROR: Database query failed.');

        while ($data=$results->fetch_array(MYSQLI_NUM)) {
            echo '<form action="" method="post">';
            echo '<button type="submit" name="'.$agency.'" value="'.$agency.'"> < Back </button>';
            echo '<p> Award Number: '.$data[0].' </p>';
            echo '<h3> '.$data[1].' </h3>';
            echo '<p> Funding Agency: '.$data[2].' </p>';
            echo '<p> Contact: '.$data[3].' | '.$data[4].' </p>';
            echo '<p> '.$data[5].' </p>';
            echo '<p> '.$data[7].' </p>';
            echo '<button type="submit" name="'.$agency.'" value="'.$agency.'"> < Back </button>';
            echo '</form>';
        }
    }
?>