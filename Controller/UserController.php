<?php 
namespace Controller;

class UserController{
    function ShowUserList(){
        $userManager = new \Model\UserManager();
        $userList = $userManager->getAll();
        var_dump($userList);
    }

    function ShowUser($id)
    {
        $userManager = new \Model\UserManager();
        $user = $userManager->getById($id);
        if ($user) 
        {
            var_dump($user);
        }
        else
        {
            echo 'Utilisateur non trouvé';
        }
    }

    function CreateUser()
    {
        $userManager = new \Model\UserManager();
        $user = new \stdClass();
        $user->mail = "test@test.fr";
        $user->password = password_hash("imverysecure",PASSWORD_DEFAULT);
        $user->pseudo = "test";
        if ($userManager->create($user)) {
            echo "Utilisateur créé !";
        }
    }

    function UpdateUser()
    {
        $userManager = new \Model\UserManager();
        $user = new \stdClass();
        $user->id = 3;
        $user->mail = "test2@test2.fr";
        $user->password = password_hash("imverysecure",PASSWORD_DEFAULT);
        $user->pseudo = "test2";
        if ($userManager->update($user)) {
            echo "Utilisateur modifié !";
        }
    }

    function DeleteUser()
    {
        $userManager = new \Model\UserManager();
        if ($userManager->delete("3")) {
            echo "Utilisateur supprimé !";
        }
    }
}
