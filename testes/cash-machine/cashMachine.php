<?php
include "Exception/NoteUnavailableException.php";

class cashMachine
{
    static $avaibleValues = array(100,50,20,10);

    public function withdrawal ($amount)
    {
        if($this->validateWithdrawal($amount)) {
            $avaibleNote = $this->getAvaibleNotesForWithdrawal($amount);
            return $this->calculateNote($amount, $avaibleNote);
        }
    }

    public function validateWithdrawal ($value)
    {
        if ($value%2 != 0) {
            throw new NoteUnavailableException("Valor impossível de ser sacado");
        }

        if ($value < 10) {
            throw new NoteUnavailableException("Valor impossível de ser sacado");
        }

        $lastUnitValue = substr($value,-1);
        if ($lastUnitValue > 0){
            throw new NoteUnavailableException("Valor impossível de ser sacado");
        }

        return true;
    }

    public function getAvaibleNotesForWithdrawal($amount)
    {
        foreach (self::$avaibleValues as $key => $note) {
            if ($amount >= $note) {
                return $key;
            }
        }
    }

    public function calculateNote($amount, $avaibleNote)
    {
        $total = $amount;
        $key = $avaibleNote;
        $returnedNotes = array();

        $counter = 1;
        while ($total > 0) {
            $note = self::$avaibleValues[$key];
            $total -= $note;
            $returnedNotes[$note] = $counter;
            $counter ++;

            if ($total < $note) {
                $key ++;
                $counter = 1;
            }
        }

        return $returnedNotes;
    }
}