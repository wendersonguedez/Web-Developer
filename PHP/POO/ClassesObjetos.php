<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Classes e Objetos</title>
</head>

<body>

    <?php
    class Carro{

        // Atributos.
        private $velocidade;
        private $cor;

        // Método __construct deve sempre ser público. O parâmetro $cor define que todo objeto Carro é obrigatório ter uma cor.
        public function __construct($cor){
            // O $this diferencia se você está acessando um atributo da classe ou um atributo que foi passado como parâmetro.
            $this->cor = $cor;
            $this->velocidade = 0;
        }

        // Função que retorna o valor de um atributo que foi definido como private. O valor é acessado através do método get
        public function getCor(){
            return $this->cor;
        }

        // Método que obtém a velocidade do carro
        public function getVelocidade(){
            return $this->velocidade;
        }

        // Método que recebe uma cor e define ela para o carro.
        public function setCor($cor){
            $this->cor = $cor;
        }
        
        // Método que recebe uma velocidade e define ela para o carro. O parâmetro é o atributo velocidade da classe.
        private function setVelocidade($velocidade){
            // Validações
            if ($velocidade > 120 || $velocidade < 0) {
                echo "Velocidade não permitida <br>";
            } else {
                $this->velocidade = $velocidade;
            }
        }

        // Métodos para acelerar e frear o carro. 
        public function acelerar(){
            $this->setVelocidade($this->getVelocidade() + 1); // setVelocidade() define a nova velocidade do carro e passa a velocidade atual do carro como parâmetro através do getVelocidade().
        }

        public function frear(){
            $this->setVelocidade($this->getVelocidade() - 1);
        }
    }

    /*
    // Instânciando um novo objeto.
    $meuCarro = new Carro();

    // Setando valor 50 para o atributo velocidade e cor preta para o atributo cor.
    $meuCarro->velocidade = 50;
    $meuCarro->cor = "Preto";

    echo "O carro de cor " . $meuCarro->cor . " está andando a " . $meuCarro->velocidade . "km";
    

    // Passando a cor vermelha como parâmetro do método construtor, onde garante uma cor para todo objeto Carro criado.
    $meuCarro = new Carro("Vermelha");
    echo "O carro de cor " . $meuCarro->cor . " está andando a " . $meuCarro->velocidade . "km <br>";
    
    $meuCarro->velocidade = 320;
    $meuCarro->cor = "Verde";
    echo "O carro de cor " . $meuCarro->cor . " está andando a " . $meuCarro->velocidade . "km";
    */
    $meuCarro = new Carro("preto");
    $meuCarro->acelerar();
    $meuCarro->acelerar();
    $meuCarro->acelerar();
    $meuCarro->acelerar();
    echo "O carro de cor " . $meuCarro->getCor() . " está andando a " . $meuCarro->getVelocidade() . "km <br>";

    // Alterando a velocidade do carro.
    //$meuCarro->setVelocidade(70);
    echo "O carro de cor " . $meuCarro->getCor() . " está andando a " . $meuCarro->getVelocidade() . "km <br>";
    
    //$meuCarro->setVelocidade(130);
    echo "O carro de cor " . $meuCarro->getCor() . " está andando a " . $meuCarro->getVelocidade() . "km <br>";

    ?>


</body>

</html>