<?php

class Texte
{

    private $texte;

    /**
     * Get the value of texte
     */ 
    public function getTexte()
    {
        return $this->texte;
    }

    /**
     * Set the value of ptext
     *
     * @return  self
     */ 
    public function setTexte($texte)
    {
        $this->texte = $texte;

        return $this;
    }

    /**
     * Method set
     */
    public function set($_texte)
    {
        $this->setTexte($_texte);

        return $this;
    }

    /**
     * Method print
     */
    public function print()
    {
        echo $this->getTexte();
    }

    /**
     * Method bold
     */
    public function bold()
    {
        $this->setTexte("<b>".$this->texte."</b>");

        return $this;
    }

    /**
     * Method italic
     */
    public function italic()
    {
        $this->setTexte("<i>".$this->texte."</i>");

        return $this;
    }

    /**
     * Method italic
     */
    public function strike()
    {
        $this->setTexte("<del>".$this->texte."</del>");

        return $this;
    }

}