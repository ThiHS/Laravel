<?php   
    class BD {  
        public $pdo;

        function __construct() {
            try {
                $this->pdo = new PDO("mysql:host=localhost;dbname=3c2_bd_jogos", 'root','');
                $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                #echo "Connected successfully";
            } catch (PDOException $e) {
                die("Connection failed: " . $e->getMessage());
            }     
        }

        public function select($campo,$tb,$where = true) {
            $sql = "SELECT $campo FROM $tb WHERE $where";
            $stmt = $this->pdo->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function insert($tb,$indice,$valor) {
            $sql = "INSERT INTO $tb ($indice) VALUES($valor)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
        }

        public function update($tb,$valor,$where) {
            $sql = "UPDATE $tb SET $valor WHERE $where";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
        }

        public function delete($tb,$where = true) {
            $sql = "DELETE FROM $tb WHERE $where";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
        }

        public function cadastro($var) {
            $indice = "";
            $valor = "";
            foreach($var as $key => $value) {
                if($key == 'titulo') {
                    $indice = $key;
                    $valor = "'$value'";
                } else {
                    $indice = ($key == 'preco')? $indice.", $key":$indice.", $key";
                    $valor = ($key == 'preco')? $valor.", $value":$valor.", '$value'";
                }
            }
            $this->insert('jogos',$indice,$valor);
        }

        public function upjogo($dados) {
            $valor = "";
            foreach($dados as $key => $value) {
                if($key == 'titulo') {
                    $valor = "$key = '$value'";
                } else {
                    $valor = ($key == 'preco')? $valor.", $key = $value" : $valor.", $key = '$value'";
                }
            }
            $this->update('jogos',$valor,"id = ".$dados['id']);
        }
    }
?>