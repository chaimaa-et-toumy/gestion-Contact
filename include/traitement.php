<?php
class Database
{

    /* Properties */
    protected $conn;
    private $dsn = 'mysql:dbname=list_contact;host=localhost';
    private $username = 'root';
    private $password = 'A1Z2E3R4T5Y6';

    /* Creates database connection */
    public function __construct()
    {
        try {
            $this->conn = new PDO($this->dsn, $this->username, $this->password);
            // echo "successful";
        } catch (PDOException $e) {
            echo "Error!: " . $e->getMessage() . "";
        }
    }
}
// classe Utilisateur
class Utilisateur extends Database
{
    public $username;
    public $password;
    public $password_verify;
    public function loginUser(string $username,  string $password)
    {
        if (isset($username) && isset($password)) {

            if (empty($username)) {
                header("Location:authenticate.php?error= username is required");
            } elseif (empty($password)) {
                header("Location:authenticate.php?error= password is required");
            } else {
                $stmt = $this->conn->prepare("SELECT * FROM utilisateur WHERE username='$username' AND password='$password' ");
                $stmt->execute();
                $user = $stmt->fetch();
                $user_username = $user['username'];
                $user_password = $user['password'];
                $user_date = $user['signupdate'];

                if ($username === $user_username && $password === $user_password) {
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['user_username'] = $user_username;
                    $_SESSION['user_date'] = $user_date;
                    date_default_timezone_set('africa/casablanca');
                    $_SESSION['date'] = date('Y/m/d H:i:s');

                    header("Location:profile.php");
                } else {
                    header("Location:authenticate.php?error= Incorrect username or password ");
                }
            }
        }
    }
    // Sign up
    public function SignUpUser(string $username,  string $password, string  $password_verify)
    {
        if (isset($username) && isset($password) && isset($password_verify)) {
            $stmt =  $this->conn->prepare("SELECT * FROM utilisateur WHERE username='$username'");
            $stmt->execute();
            $user = $stmt->fetch();
            $user_username = $user['username'];


            if ($user) {

                if ($username === $user_username) {
                    header("Location:inscription.php?error= username is already exist");
                }
            } elseif ($password === $password_verify) {
                // $password = hash('sha256', $password);
                date_default_timezone_set('africa/casablanca');
                $dateSign = date('Y/m/d H:i:s');
                $q = "insert into utilisateur (username , password , signupdate ) values ( '" . $username . "' , '" . $password . "' , '" . $dateSign . "') ";
                $stmt = $this->conn->prepare($q);
                $stmt->execute();
                $user = $stmt->fetch();
                header('location:authenticate.php');
            }
        }
    }
    public function affichage()
    {
        $conn = $this->conn;
        $id = $_SESSION['user_id'];
        $stmt = $conn->prepare("SELECT * FROM contact  WHERE id_utilisateur = $id");
        $stmt->execute();
        return $stmt;
    }
}
// Class Contact
class Contact extends Database
{
    public  $name;
    public $phone;
    public $email;
    public  $adresse;
    public  $idfk;

    public function addContact(string $name, string $phone, string $email, string $adresse)
    {
        if (isset($name) && isset($phone) && isset($email) && isset($adresse)) {
            $fk = $_SESSION['user_id'];
            $stmt = $this->conn->prepare("SELECT * FROM contact");
            $stmt->execute();
            $user = $stmt->fetch();
            $contact_email = $user['email'];

            if ($contact_email === $email) {
                header("Location:contact.php?error= Email already exist");
            } elseif ($name != "" && $phone != "" && $email != "" && $adresse != "") {
                $q = "insert into contact (name,phone,email,Adress,id_utilisateur) values ( '" . $name . "', '" . $phone . "'  , '" . $email . "' , '" . $adresse . "' , '" . $fk . "' )";
                $stmt = $this->conn->prepare($q);
                $stmt->execute();
                header('location:contact.php');
            }
        }
    }
    public function delete($id)
    {
        $stmt = $this->conn->prepare("delete from contact where id = ?");
        $stmt->execute([$id]);
        header('location:contact.php');
    }
    public function affichUpdate($id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM contact WHERE id='$id'");
        $stmt->execute();
        $contact = $stmt->fetch();

        if ($contact)
            return $contact;
        else
            header("Location:contact.php?pageerror= Contact not found");
    }
    public function update($name, $phone, $email, $adresse)
    {
        if (isset($name) && isset($phone) && isset($email) && isset($adresse)) {
            $id = $_POST['id'];
            $fk = $_SESSION['user_id'];
            $stmt = $this->conn->prepare("SELECT * FROM contact WHERE email='$email'");
            $stmt->execute();
            $result = $stmt->fetch();

            if ($result) {
                header("Location:contact.php?pageerror= Email already exist");
            } else {
                $q = "update contact set name='" . $name . "', phone='" . $phone . "', email='" . $email . "', Adress='" . $adresse
                    . "' where id=" . $id;
                $stmt = $this->conn->prepare($q);
                $stmt->execute();

                header('location:contact.php');
            }
        }
    }
}

$db = new Utilisateur();
$dbC = new Contact();
