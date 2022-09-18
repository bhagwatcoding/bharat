<?php
// Day Generator
switch (date('w')):
    case 0: $day = "रविवार"; break;
    case 1: $day = "सोमवार"; break;
    case 2: $day = "मंगलवार"; break;
    case 3: $day = "बुधबार"; break;
    case 4: $day = "बृहस्पतिवार"; break;
    case 5: $day = "शुक्रवार"; break;
    case 6: $day = "शनिवार"; break;
    default: echo "Day Error";
endswitch;
// Month Generator

switch (date('m')):
    case 1: $month = "जनवरी"; break;
    case 2: $month = "फरवरी"; break;
    case 3: $month = "मार्च"; break;
    case 4: $month = "अप्रैल"; break;
    case 5: $month = "मई"; break;
    case 6: $month = "जून"; break;
    case 7: $month = "जूलाई"; break;
    case 8: $month = "अगस्त"; break;
    case 9: $month = "सितम्बर"; break;
    case 10: $month = "अक्टूबर"; break;
    case 11: $month = "नवम्बर"; break;
    case 12: $month = "दिसम्बर"; break;
    default: echo "Month Error";
endswitch;

// echo $day.', '. date('d')." " .$month.' '. date('Y').' '. date('h:m:s a');

 ?>
