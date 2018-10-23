<?php
/**
 * Created by IntelliJ IDEA.
 * User: potchjust
 * Date: 19/10/18
 * Time: 15:11
 */

namespace App;


class Form
{
    private $datas;

    public function __construct($datas=array())
    {

        $this->datas = $datas;
    }

    public function input($type,$name,$class=false,$id=false)
    {
        return "<input type='.$type.' class='.$class.' id='.$class.'>";
    }
    public function submit($name,$class=false)
    {
        return "<input type='submit' value='.$name.' class='.$class.'>";
    }


}