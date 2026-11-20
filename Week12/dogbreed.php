<?php
$breeds = array("Labrador Retriever", "German Shepherd", "Golden Retriever", "Bulldog", "Beagle", "Poodle");

$breed = strtolower($_GET["breed"]);
$found = "";

foreach ($breeds as $name)
{
    if ($breed == strtolower(substr($name, 0, strlen($breed))))
    {
        if ($found == "")
        {
            $found = $name;
        }
        else
        {
            $found = $found . ", " . $name;
        }
    }
}

if ($found == "")
{
    echo "Dog Breed not found";
}
else
{
    echo $found;
}
?>