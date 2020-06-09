<?php
namespace Framework;

// Lié a la class Field.php, permet de gérer les TextField pour les Form. //
class TextField extends Field
{
  protected $cols;
  protected $rows;
  
    public function buildWidget()
    {
        $widget = '';

        if (!empty($this->errorMessage))
        {
            $widget .= $this->errorMessage.'<br />';
        }

        $widget .= '<p class="'.$this->p_class.'"><label class="label required" for="'.$this->name.'">'.$this->label.'</label><textarea class="'.$this->class.'" name="'.$this->name.'"';

        if (!empty($this->cols))
        {
            $widget .= ' cols="'.$this->cols.'"';
        }

        if (!empty($this->rows))
        {
            $widget .= ' rows="'.$this->rows.'"';
        }

        $widget .= '>';

        if (!empty($this->value))
        {
            $widget .= htmlspecialchars($this->value);
        }

        return $widget.'</textarea></p>';
    }

        public function setCols($cols)
        {
            $cols = (int) $cols;

            if ($cols > 0)
            {
                $this->cols = $cols;
            }
        }

        public function setRows($rows)
        {
            $rows = (int) $rows;

            if ($rows > 0)
            {
                $this->rows = $rows;
            }
    }

}

?>