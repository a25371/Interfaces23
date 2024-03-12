<?php
    define('HOST', '127.0.0.1');
    define('USER', 'root');
    define('PASS', '');
    define('DB', 'di23');

    class DAO{
		private $conexion; 
				
		public function __construct(){ //constructor
			$this->conexion= new mysqli(HOST,USER,PASS,DB);
			if($this->conexion->connect_errno){
				die('Error de conexión: '.$this->conexion->connect_error);
			}
		}

        public function consultar($SQL){
			//NO VISUALIZAR NADA AQUI PUES NO RETURN-ARA BIEN
			$res=$this->conexion->query($SQL,MYSQLI_USE_RESULT); //sin usar buffer mysql
			$filas=array();
			if ($this->conexion->errno) {
					die('Error en consulta: '.$this->conexion->error.' SQL: <b>'.$SQL.'</b>');
			}else{
				while($reg=$res->fetch_assoc()){
					$filas[]=$reg;
				}
			}
			return $filas;
		}

		public function insertar($SQL){
            if ($this->conexion->query($SQL) === TRUE) {
                return $this->conexion->insert_id;
            } else {
                die('Error insertar BD: ' . $this->conexion->error);
            }
        }
        

        public function actualizar($SQL){
            $this->conexion->query($SQL, MYSQLI_USE_RESULT);
            if($this->conexion->connect_errno){
                die('Error update BD: '.$SQL);
            }else{
                return $this->conexion->affected_rows;
            }
        }

        public function borrar($SQL){
			$this->conexion->query($SQL);
			return $this->conexion->affected_rows;
		}
    }
