<?php

class Student
{
    private $id;


//建立一个学生类,类里面有四个成员变量,都是私有成员变量,,,,

    private $name;
    private $gender;
    private $age;
    private $telephone;

    /**
     * @return mixed
     */


    /*在php里面,函数前面要带function,*/
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {

//        变量前面带有$,这是php的特色,,this->name相当于一个变量,所以在this前面加上$,,,,,,不能写成$this->$name,,,,,,,也不能写成this->$name

        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @param mixed $gender
     */
    public function setGender($gender)
    {
//        注意
        $this->gender = $gender;
    }

    /**
     * @return mixed
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * @param mixed $age
     */
    public function setAge($age)
    {
        $this->age = $age;
    }

    /**
     * @return mixed
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * @param mixed $telephone
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;
    }

    function __toString()
    {
        return "Student{id=$this->id, name='$this->name',
        gender='$this->gender', age=$this->age,
        telephone='$this->telephone'}";
    }
}

?>