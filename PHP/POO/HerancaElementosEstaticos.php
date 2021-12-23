<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Herença e elementos estáticos</title>
</head>
<body>
    <?php
    /* Herança */
        
        class InstrumentoMusical {
            public $isPercussao;
            public $volume;

            public function __construct($isPercussao, $volume) { 
                $this->isPercussao = $isPercussao;
                $this->volume = $volume;
            }

            // poderia utilizar o operador 'final', que impede a sobrescrita de métodos em suas subclasses.
            public function tocar() {
                echo "Tocando no volume: " . $this->volume . " decibéis. <br>";
            }
        }

        class Guitarra extends InstrumentoMusical{
            //Sobrescrevendo método tocar().
            public function tocar() {
                echo "Amplificador ligado em " . $this->volume . " decibéis. <br>";
            }

            public function tocarGuitarra() {
                // Chamando o método tocar().
                $this->tocar();

                // Operador parent faz uma chamada da classe hierarquicamente maior que a atual. O método tocar() da classe acima está sendo invocado.
                parent::tocar();
            }
        }

        $instrumentoMusical = new InstrumentoMusical(true, 80);
        // Verificando se o instrumento musical é de percussão ou não.
        if($instrumentoMusical->isPercussao){
            echo "Instrumento de percussão, volume: " . $instrumentoMusical->volume . "<br>";
        } else {
            echo "Instrumento não é de percussão, volume: " . $instrumentoMusical->volume . "<br>";
        } 
        $instrumentoMusical->tocar();
    
        
        $guitarra = new Guitarra(false, 40);
        if($guitarra->isPercussao){
            echo "Instrumento de percussão, volume: " . $guitarra->volume . "<br>";
        } else {
            echo "Instrumento não é de percussão, volume: " . $guitarra->volume . "<br>";
        }
        $guitarra->tocar();

        $guitarra->tocarGuitarra();

    /* Herança */
    
    
    /* Elementos estáticos */
    
        class escalaMusical {

            public static $escalaDoMaior = "C D E F G A B C <br>";
            public $vezesUtilizada;
            public static function calcularDecibeis($watts) {
                return $watts / 10 . "<br>";
            }
        }

        // Acessando o atributo da classe escalaMusical.
        echo escalaMusical::$escalaDoMaior;
        echo escalaMusical::calcularDecibeis(123);
    
        $em = new escalaMusical();
        $em->vezesUtilizada = 3;
        echo "A escala foi utilizada: " . $em->vezesUtilizada . " vezes"; 
    
    /* Elementos estáticos */

    ?>
</body>
</html>