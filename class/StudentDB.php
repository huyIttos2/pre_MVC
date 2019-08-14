<?php
class StudentDB
{
    public $connection;

    public function __construct()
    {
        $DBConnect = new DBConnect();
        $this->connection = $DBConnect->connect();
    }

    public function getAll()
    {
        $sql = "SELECT *FROM students";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetchAll();
        $arr =[];
        foreach ($data as  $item){
            $student = new Student($item['name'],$item['phone'],$item['address']);
            array_push($arr,$student);
            $student->id = $item['id'];
        }
        return $arr;
        ;
    }

    public function create($student)
    {
            $sql = "INSERT INTO students(name, phone, address) VALUES(:name, :phone, :address)";
            $stmt = $this->connection->prepare($sql);
            $stmt->bindparam(':name', $student->name);
            $stmt->bindparam(':phone', $student->phone);
            $stmt->bindparam(':address', $student->address);
            $stmt->execute();
            echo "<font color='green'>Student added successfully.";
            header('Location: index.php');
    }
    public function delete($id){
        $sql = "DELETE FROM students WHERE id = ?";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $id);
        return $statement->execute();

    }
    public function update($id,$student)
    {
            $sql = "UPDATE students SET name = ?, phone = ?, address = ? WHERE id = ?";
            $statement = $this->connection->prepare($sql);
            $statement->bindParam(1, $student->name);
            $statement->bindParam(2, $student->phone);
            $statement->bindParam(3, $student->address);
            $statement->bindParam(4, $id);
            $statement->execute();
    }
    public function get($id)
    {
        $sql = "SELECT * FROM students WHERE id = ?";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $id);
        $statement->execute();
        $row = $statement->fetch();
        $student = new student($row['name'], $row['phone'], $row['address']);
        $student->id = $row['id'];
        return $student;
    }
}
