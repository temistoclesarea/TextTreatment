<?php
/**
 * Classe AutoLoad
 * @author Temístocles Arêa
 */
class AutoLoad 
{
    
    private $arquivos;
    
    private $subExtensao = '.class';
    
    public function __construct() 
    {
        
        spl_autoload_register( [$this, 'diretorios'] );
        
    }
    
    private function diretorios( $itens )
    {
        
        $this->arquivos = [$itens . $this->subExtensao . '.php'];
        
        foreach ( $this->arquivos as $arquivo ) {
            
            if( file_exists( $arquivo ) ) {
                
                require_once str_replace( "\\", "/", $arquivo );
                
            }
            
        }
        
    }
    
}

new AutoLoad;
