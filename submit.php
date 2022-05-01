<!DOCTYPE html>
<html>
    <!-- it is a shared page top HTML where has icon and css link  -->
   
    <head>
        <title>Match-Maker</title>
       
        <meta charset="utf-8" />
       
   
        <link href=" https://codd.cs.gsu.edu/~adhar2/Extra/Dating.css" type="text/css" rel="stylesheet" />
   
        <link href=" https://codd.cs.gsu.edu/~adhar2/WP/CW/CW0/image/blacklove.png " type="image/gif" rel="shortcut icon" />
 
    </head>
 
    <body>
    <div id="bannerarea" >
			<img src="https://codd.cs.gsu.edu/~adhar2/WP/CW/CW0/image/matchmaker.png " alt="banner logo" /> 
			<h5>Find Your Love<h5>
		</div> 
       
 
    <div>
        <h1>Love for <?= $_GET["name"] ?></h1>
        <?php
        # finds the users information through looping over the file
        foreach(file("singles.txt") as $singles) {
            list($name, $gender, $age, $personalitytype, $os, $min, $max) = explode(",", $singles);
            if($name == $_GET["name"]) {
                # array containing user's information
                $user = array ($name, $gender, $age, $personalitytype, $os, $min, $max);
                break;
            }
        }
        # finding matches for the user through looping over the file
        foreach(file("singles.txt") as $singles) {
            list($name, $gender, $age, $personalitytype, $os, $min, $max) = explode(",", $singles);
            $other_user = array($name, $gender, $age, $personalitytype, $os, $min, $max);
            # checking for whether the singles meet the users criteria to be a match
            if(issoulmate($user, $other_user)) {
            ?>
                <div class="match">
                    <p>
                        <img
                            src="https://codd.cs.gsu.edu/~adhar2/WP/CW/CW0/image/loves.png" 
                            alt="icon" />
                        <?= $name ?>
                    </p>
                    <ul>
                        <li><strong>gender:</strong> <?= $gender; ?></li>
                        <li><strong>age:</strong> <?= $age; ?> </li>
                        <li><strong>type:</strong> <?= $personalitytype; ?> </li>
                        <li><strong>OS:</strong> <?= $os; ?></li>
                    </ul>
                </div>
            <?php } ?>
        <?php } ?>  
    </div>
   
    <?php
    # This function takes two strings as parameters and checks whether there is
    # any common between the two of them and returns true if there is it save it show the matches for this person
    function contains($s1, $s2) {
        for($i = 0; $i < strlen($s1); $i++) {
            for($j = 0; $j < strlen($s2); $j++) {
                if($s1[$i] == $s2[$j]) {
                    return true;
                }
            }
        }
    }
    # this function takes two users as parameters and checks whether they
    # are compatible based on certain constraints and returns true if they are
    function issoulmate($user, $other_user) {
        return (strcmp($other_user[1], $user[1]) != 0) and ($other_user[4] == $user[4]) and
            $user[2] >= $other_user[5] and $user[2] <= $other_user[6] and
            $other_user[2] >= $user[5] and $other_user[2] <= $user[6] and
            contains($user[3], $other_user[3]);
    }?>
<div>
    <p>
        Thank you for visiting our website to find your love.
    </p>
   
    <ul>
        <li>
            <a href=" https://codd.cs.gsu.edu/~adhar2/Extra/Dating.html">  
                <img src=" https://codd.cs.gsu.edu/~adhar2/WP/HW/HW04/Image%20for%20Hw04/back.gif" alt="icon" />
                Return to first page
            </a>
        </li>
    </ul>
</div>
 
</body>
</html>