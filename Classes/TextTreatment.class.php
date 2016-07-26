<?php
namespace Classes;

/**
 * Classe de tratamento de textos compativel com acentuação no padrão UTF-8
 *
 * @author Temístocles Arêa
 * @version 1.0
 *
 */
class TextTreatment 
{
    /**
     * String de conversão
     * @var string $str
     */
    private $str;
    
    /**
     * Codificação
     * @var string $cod
     */
    private $cod = 'UTF-8';
    
    /**
     * Palavras reservadas para tratamento de nomes proprios
     * @var array $c
     */
    private $c = array( '', 'da', 'de', 'di', 'do', 'du', 'das', 'dos', 'e', 'a' );
    
    /**
     * Construtor
     * @param string $str
     */
    public function __construct( $str = null )
    {
        $this->setStr( $str );
    }
    
    /**
     * getStr
     * @return string
     */
    public function getStr()
    {
        return $this->str;
    }
    
    /**
     * setStr
     * @param string $str
     */
    public function setStr( $str )
    {
        $this->str = $str;
    }
    
    /**
     * allUppercase
     * @return string
     */
    public function allUppercase()
    {
        return mb_strtoupper( $this->getStr(), $this->cod );
    }
    
    /**
     * allLowercase
     * @return string
     */
    public function allLowercase()
    {
        return mb_strtolower( $this->getStr(), $this->cod );
    }
    
    /**
     * firtWordUppercase
     * @return string
     */
    public function firstWordUppercase()
    {
        return mb_convert_case( $this->getStr(), MB_CASE_TITLE, $this->cod );
    }
    
    /**
     * firstSentenceUppercase
     * @return string
     */
    public function firstSentenceUppercase()
    {
        return mb_strtoupper( mb_substr( $this->getStr(), 0, 1 ) ).mb_substr( $this->getStr(), 1 );
    }
    
    /**
     * properNames
     * @return string
     */
    public function properNames()
    {
        $nome = explode( " ", $this->allLowercase() ); 
        $convertido = "";
        for ( $cont = 0; $cont < count( $nome ); $cont++ ) {
            $temp = mb_strtolower( $nome[$cont], $this->cod );
            if ( array_search( $temp, $this->c ) == null ) {
                $convertido .= mb_convert_case( $temp, MB_CASE_TITLE, $this->cod ) . " ";
            } else {
                $convertido .= $temp . " ";
            }
        }
        return( trim( $convertido ) );
    }
    
    /**
     * limitText
     * @param int $t
     * @return string
     */
    public function limitText( $t = 40 )
    {
        
        if ( strlen( $this->getStr() ) > $t ) {
            return mb_substr( $this->getStr(), 0, $t - 3, $this->cod ) . '...';
        } else {
            return mb_substr( $this->getStr(), 0, $t, $this->cod );
        }

    }
    
    /**
     * sanitizeString
     * @param boolean $b
     * @return string
     */
    public function sanitizeString($b = false) 
    {
        $str = $this->getStr();
        $str = preg_replace('/[áàãâä]/ui', 'a', $str);
        $str = preg_replace('/[éèêë]/ui', 'e', $str);
        $str = preg_replace('/[íìîï]/ui', 'i', $str);
        $str = preg_replace('/[óòõôö]/ui', 'o', $str);
        $str = preg_replace('/[úùûü]/ui', 'u', $str);
        $str = preg_replace('/[ç]/ui', 'c', $str);
        if( $b == true ) {
            $str = preg_replace('/[,(),;:|!"#$%&=?~^><ªº-]/', '_', $str);
        }
        $str = preg_replace('/[^a-z0-9]/i', '_', $str);
        $str = preg_replace('/_+/', '_', $str); 
        $str = mb_strtolower($str, $this->cod);
        return $str;
    }

}