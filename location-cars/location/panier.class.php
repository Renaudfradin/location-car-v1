<?php
class panier {
    private $bdd;
    public function __construct($bdd){
        if (!isset($_SESSION)) {
            session_start();
        }
        if (!isset($_SESSION['panier'])) {
            $_SESSION['panier'] = array();
        }
        $this->bdd = $bdd;
    }

    public function total(){
        $total = 0;

        //la variable ids va recuperer les id des location
        $ids=array_keys($_SESSION['panier']);  

        if (empty($ids)) {
            $cars = array();
            //echo "<br>il ny a aucune location reserver<br>";
        }else{
            $cars = $this->bdd->query('SELECT id,price FROM cars WHERE id IN ('.implode(',',$ids).')');
        }

        foreach ($cars as $car) {
            $total += $car->price;
        }
        return $total;

    }

    public function count(){
        return array_sum($_SESSION['panier']);
    }
    public function add($car_id){
        //if (isset($_SESSION['panier'][$car_id])) {
           // $_SESSION['panier'][$car_id]++;
        //}else {
            //la on roujet l id du produit a 1
            $_SESSION['panier'][$car_id] = 1;
       // }
        
    }

    public function dell($car_id){
        unset($_SESSION['panier'][$car_id]);
    }

    
}



?>