<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Ansh Kakkar MD5</title>
  </head>
  <body>
    <h1>MD5 Cracker</h1>
    <p>This application takes an MD5 hash
    of a four-digit "PIN" number and
    attempts to hash all four-digit combinations
    to determine the original four "PIN" numbers.</p>
    <pre>Debug Output:
    <?php
    $goodtext = "Not found";
    // If there is no parameter, this code is all skipped
    if ( isset($_GET['md5']) ) {
        $time_pre = microtime(true);
        $md5 = $_GET['md5'];

        // This is our alphabet
        $txt = "0123456789";
        $show = 15;
        $tc=0;
        // Outer loop to go through the alphabet for the
        // first position in our "possible" pre-hash
        // text
        for($i=0; $i<strlen($txt); $i++ ) {
            $ch1 = $txt[$i];   // The first of four characters

            for($j=0; $j<strlen($txt); $j++ ) {
                $ch2 = $txt[$j];  // Our second character
                for($k=0; $k<strlen($txt); $k++ ) {
                    $ch3 = $txt[$k];   // Our third character
                    for($n=0; $n<strlen($txt); $n++ ) {
                        $ch4 = $txt[$n];   // Our fourth character
                // Concatenate the four characters together to
                // form the "possible" pre-hash text
                        $try = $ch1.$ch2.$ch3.$ch4;

                // Run the hash and then check to see if we match
                        $check = hash('md5', $try);
                        if ( $check == $md5 ) {
                         $goodtext = $try;
                         break;   // Exit the inner loop
                       }
                         $tc=$tc+1;
                // Debug output until $show hits 0
                         if ( $show > 0 ) {
                         print "\n$check $try";
                         $show = $show - 1;
                      }
                  }
               }
            }
        }

        print "\nTotal Checks: $tc";
        // Compute elapsed time
        $time_post = microtime(true);
        print "\nElapsed time: ";
        print $time_post-$time_pre;
        print "\n";
    }
    ?>
    </pre>
    <!-- Use the very short syntax and call htmlentities() -->
    <p>Original Text: <?= htmlentities($goodtext); ?></p>
    <form>
    <input type="text" name="md5" size="60" />
    <input type="submit" value="Crack MD5"/>
    </form>
    <ul>
    <li><a href="index.php">Reset</a></li>
    <li><a href="md5.php">MD5 Encoder</a></li>
    </ul>
  </body>
</html>
