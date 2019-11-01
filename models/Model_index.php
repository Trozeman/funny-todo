<?php
Class Model_index{
    function __construct()
    {
        $this->data = [
            (object)["id"=>1,"username" => "Donut", "email" => "donut@som.com",  "data" => "Cook that nice DONUT!", "done"=>true],
            (object)["id"=>2,"username" => "Tunod", "email" => "Tunod@som.com",  "data" => "!TUNOD ecin taht kooC", "done"=>false],
            (object)["id"=>3,"username" => "Terry", "email" => "Terry@som.com",  "data" => "Cook that nice DONUT!", "done"=>false],
            (object)["id"=>4,"username" => "Mike", "email" => "Mike@som.com",  "data" => "Kick them...", "done"=>false],
            (object)["id"=>5,"username" => "John", "email" => "John@som.com",  "data" => "I can shoot you!", "done"=>true],
            (object)["id"=>13,"username" => "John", "email" => "John@som.com",  "data" => "I can shoot you!", "done"=>true],
            (object)["id"=>6,"username" => "Jenifer", "email" => "Taylor@som.com",  "data" => "Make stuff!", "done"=>false],
            (object)["id"=>7,"username" => "Candy", "email" => "Candy@som.com",  "data" => "In the end....", "done"=>false],
            (object)["id"=>8,"username" => "Sem", "email" => "Sem@som.com",  "data" => "Drink a lot!", "done"=>false],
            (object)["id"=>9,"username" => "Ogy", "email" => "Ogy@som.com",  "data" => "Catch them all!", "done"=>true],
            (object)["id"=>10,"username" => "Chen", "email" => "Chen@som.com",  "data" => "Hands of good!", "done"=>false],
            (object)["id"=>11,"username" => "Cory", "email" => "Cory@som.com",  "data" => "Best of drum!", "done"=>false],
            (object)["id"=>12,"username" => "Taylor", "email" => "Taylor@som.com",  "data" => "-.-- --- ..-  .- .-. .  -. .. -.-. .", "done"=>false]
        ];
    }

    public function getData(){
        return $this->data;
    }

    public function getSortData($sortBy){
        function name($a, $b) {
            return strcmp($a->username, $b->username);
        }
        function email($a, $b) {
            return strcmp($a->email, $b->email);
        }
        function done($a, $b) {
            return strcmp($a->done, $b->done);
        }
        function id($a, $b) {
            return strcmp($a->id, $b->id);
        }

        usort($this->data, $sortBy);

        return  $this->data;
    }

}