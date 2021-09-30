<?php


class Student
{
    private $id;
    private $name;
    private $email;
    private $password;
    private $phone;
    private $course;
    private $status;
    private $created_at;
    private $updated_at;

    /**
     * @return mixed
     */
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
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param mixed $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * @return mixed
     */
    public function getCourse()
    {
        return $this->course;
    }

    /**
     * @param mixed $course
     */
    public function setCourse($course)
    {
        $this->course = $course;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * @param mixed $created_at
     */
    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;
    }

    /**
     * @return mixed
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    /**
     * @param mixed $updated_at
     */
    public function setUpdatedAt($updated_at)
    {
        $this->updated_at = $updated_at;
    }

    public function read()
    {
        $pdo = Banco::conectar();
        $query = 'SELECT * FROM students ORDER BY id ASC';
        return $pdo->query($query);
    }

    public function create($name, $email,$password,$phone,$course,$status)
    {

        $now = date("Y-m-d H:i:s");
        $pdo = Banco::conectar();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO students (`name`, `email`, `password`, `phone`, `course`, `status`, `created_at`, `updated_at`) VALUES(?,?,?,?,?,?,?,?)";
        $q = $pdo->prepare($sql);
        $q->execute(array($name, $email,$password,$phone,$course,$status,$now,$now));
        Banco::desconectar();
        header("Location: index.php");

    }

    public function view($id)
    {
        $pdo = Banco::conectar();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM students where id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        return $q->fetch(PDO::FETCH_ASSOC);
        Banco::desconectar();
    }

    public function update($name, $email,$password,$phone,$course,$status, $id)
    {
        $now = date("Y-m-d H:i:s");
        $pdo = Banco::conectar();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE students set name = ?, email = ?, password = ?, phone = ?, course = ? , status = ? , updated_at = ? WHERE id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($name, $email,$password,$phone,$course,$status, $now, $id));
        Banco::desconectar();
        header("Location: index.php");
    }

    public function delete($id)
    {
        //Delete do banco:
        $pdo = Banco::conectar();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "DELETE FROM students where id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        Banco::desconectar();
        header("Location: index.php");
    }


}