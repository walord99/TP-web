<?php
if(isset($_SESSION['user'])){
    unset($_SESSION['user']);
    redirect("accueil?disconnected=true");
} else {
    redirect("accueil?disconnected=false");
}