<?php
include "cashMachine.php";

class cashMachineTest extends PHPUnit_Framework_TestCase
{
    /**
    * @dataProvider correctValues
    */
    public function testValidateWithdrawalShouldReturnTrue($value)
    {
        $cashMachine = new cashMachine();

        $return = $cashMachine->validateWithdrawal($value);
        $this->assertTrue($return);
    }

    /**
     * @expectedException NoteUnavailableException
     * @dataProvider      exceptionValues
     */
    public function testValidateWithdrawalShouldThrowNoteUnavailableException($value)
    {
        $cashMachine = new cashMachine();
        $return = $cashMachine->validateWithdrawal($value);
    }

    public function testCalculateNoteShouldReturnTheCorrectNotes()
    {
        $cashMachine = new cashMachine();
        $notes = $cashMachine->calculateNote(90,1);

        $correctArray = array(50 => 1,20 => 2);
        $this->assertEquals($correctArray, $notes);
    }

    /**
     * @dataProvider      amountProvider
     */
    public function testWithdrawalShouldSucced($value)
    {
        $cashMachine = new cashMachine();
        $return = $cashMachine->withdrawal($value['valor']);

        $this->assertEquals($value['notas'], $return);
    }

    /**
     * @expectedException NoteUnavailableException
     * @dataProvider      wrongAmountProvider
     */
    public function testWithdrawalShouldThrowNoteUnavaibleException($value)
    {
        $cashMachine = new cashMachine();
        $return = $cashMachine->withdrawal($value['valor']);
    }

    public function correctValues()
    {
        return array(
            array(100),
            array(30),
            array(80)
            );
    }

    public function exceptionValues()
    {
        return array(
            array(125),
            array(6),
            array(95),
            array(424)
            );
    }

    public function amountProvider()
    {
        return array(
            array(
                    array(
                        'valor' => 80,
                        'notas' => array(50 => 1, 20 => 1, 10 => 1),
                        )
                ),
            array(
                    array(
                        'valor' => 90,
                        'notas' => array(50 => 1, 20 => 2),
                        ),
                ),
            array(
                    array(
                        'valor' => 100,
                        'notas' => array(100 => 1),
                        ),
                ),
            array(
                    array(
                        'valor' => 50,
                        'notas' => array(50 => 1),
                        ),
                ),
            array(
                    array(
                        'valor' => 350,
                        'notas' => array(100 => 3 , 50 => 1),
                        ),
                ),
            );
    }

    public function wrongAmountProvider()
    {
        return array(
            array(
                    array(
                        'valor' => 315,
                        'notas' => array(),
                        )
                ),
            array(
                    array(
                        'valor' => 425,
                        'notas' => array(),
                        ),
                ),
            array(
                    array(
                        'valor' => 424,
                        'notas' => array(),
                        ),
                ),
            );
    }
}