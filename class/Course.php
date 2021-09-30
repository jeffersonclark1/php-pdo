<?php


class Course
{
    private $id;
    private $nameCourse;
    private $description;
    private $dateStart;
    private $dateFinish;
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
    public function getNameCourse()
    {
        return $this->nameCourse;
    }

    /**
     * @param mixed $nameCourse
     */
    public function setNameCourse($nameCourse)
    {
        $this->nameCourse = $nameCourse;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getDateStart()
    {
        return $this->dateStart;
    }

    /**
     * @param mixed $dateStart
     */
    public function setDateStart($dateStart)
    {
        $this->dateStart = $dateStart;
    }

    /**
     * @return mixed
     */
    public function getDateFinish()
    {
        return $this->dateFinish;
    }

    /**
     * @param mixed $dateFinish
     */
    public function setDateFinish($dateFinish)
    {
        $this->dateFinish = $dateFinish;
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
        $query = 'SELECT * FROM courses ORDER BY id ASC';
        return $pdo->query($query);
    }

    public function create($nameCourse, $description, $dateStart, $dateFinish, $status)
    {

        $now = date("Y-m-d H:i:s");
        $pdo = Banco::conectar();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO courses (`nameCourse`, `description`, `dateStart`, `dateFinish`, `status`, `created_at`, `updated_at`) VALUES(?,?,?,?,?,?,?)";
        $q = $pdo->prepare($sql);
        $q->execute(array($nameCourse, $description, $dateStart, $dateFinish, $status,$now, $now));
        Banco::desconectar();
        header("Location: index.php");

    }

    public function view($id)
    {
        $pdo = Banco::conectar();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM courses where id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        return $q->fetch(PDO::FETCH_ASSOC);
        Banco::desconectar();
    }

    public function update($nameCourse, $description, $dateStart, $dateFinish, $status, $id)
    {
        $now = date("Y-m-d H:i:s");
        $pdo = Banco::conectar();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE courses set nameCourse = ?, description = ?, dateStart = ?, dateFinish = ?, status = ? , updated_at = ? WHERE id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($nameCourse, $description, $dateStart, $dateFinish, $status,$now, $id));
        Banco::desconectar();
        header("Location: index.php");
    }

    public function delete($id)
    {
        //Delete do banco:
        $pdo = Banco::conectar();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "DELETE FROM courses where id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        Banco::desconectar();
        header("Location: index.php");
    }


}