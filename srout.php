<?php
if(isset($_POST['searchInput'])){
    $req = $_POST['searchInput'];
    if($req == "Plumber"){     
        header("Location: service/others2.php?input=plumber");
        exit;
    }elseif($req == "Electrician"){     
        header("Location: service/others2.php?input=electricians");
        exit;
    }elseif($req == "Cleaner"){     
        header("Location: service/others2.php?input=cleaner");
        exit;
    }elseif($req == "AC Repair"){     
        header("Location: service/others2.php?input=ac_repair");
        exit;
    }elseif($req == "Car Repair"){     
        header("Location: service/others2.php?input=car_repair");
        exit;
    }elseif($req == "Beauty"){     
        header("Location: service/others2.php?input=beauty");
        exit;
    }elseif($req == "Salon"){     
        header("Location: service/others2.php?input=salon");
        exit;
    }elseif($req == "Carpenter"){     
        header("Location: service/others2.php?input=carpainter");
        exit;
    }else{     
        header("Location: main.php");
        exit;
    }
}
?>
